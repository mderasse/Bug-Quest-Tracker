<?php

/**
 * PeanutPage form.
 *
 * @package    peanut
 * @subpackage form
 * @author     Alexandre pocky BALMES
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class peanutPageForm extends BasepeanutPageForm
{
  public function configure()
  {
    $user = self::getValidUser();
    
    $this->useFields(array(
      'title',
      'slug',
      'content',
      'excerpt',
      'author',
      'status',
      'created_at',
    ));
    
    $this->widgetSchema->setHelps(array(
      'slug'     => 'The field is not required',
      'excerpt'  => 'The field is not required',
    ));
    
    $this->widgetSchema->moveField('slug', sfWidgetFormSchema::AFTER, 'title');
    
    $this->widgetSchema['content'] = new sfWidgetFormCKEditor(array('jsoptions'=>array(
    	'customConfig'				      => '/js/ckeditor/config.js',
    	'filebrowserBrowseUrl'		  => '/js/filemanager/index.html',
    	'filebrowserImageBrowseUrl'	=> '/js/filemanager/index.html?type=Images',
    )));
    
    /**
     *
     * Le code qui suit permet de gérer le nestedSet du formulaire
     */
     
    $this->widgetSchema['parent'] = new sfWidgetFormDoctrineChoiceNestedSet(array(
      'model'     => 'peanutPage',
      'add_empty' => 'This is a first level category',
    ));
    
    $this->validatorSchema['parent'] = new sfValidatorDoctrineChoiceNestedSet(array(
      'required' => false,
      'model'    => 'peanutPage',
      'node'     => $this->getObject(),
    ));
    
    if($this->getObject()->getNode()->hasParent())
    {
      $this->setDefault('parent', $this->getObject()->getNode()->getParent()->getId());
    }
    
    $this->setValidator('parent', new sfValidatorDoctrineChoiceNestedSet(array(
      'required'    => false,
      'model'       => 'peanutPage',
      'node'        => $this->getObject(),
    )));
    
    $this->getValidator('parent')->setMessage('node', 'A page cannot be made a descend of itself!');
    
    /**
     *
     * Permet de faire un unset lors de la création d'une nouvelle page
     */
    
    if(!$this->isNew()) {
      $this->widgetSchema['created_at'] = new sfWidgetFormI18nDate(array(
        'culture' => $user->getCulture(),
      ));
    }
    else
    {
      unset($this['created_at']);
    }
    
  }
  
  protected function doSave($con = null)
  {
    parent::doSave($con);
    
    $node = $this->object->getNode();
    
    if($this->getValue('parent'))
    {
      $parent = Doctrine::getTable('peanutPage')->findOneById($this->getValue('parent'));
      if($this->isNew())
      {
        $this->getObject()->getNode()->insertAsLastChildOf($parent);
      }
      else
      {
        $this->getObject()->getNode()->moveAsLastChildOf($parent);
      }
    }
    else
    {
      $categoryTree = Doctrine::getTable('peanutPage')->getTree();
      if($this->isNew())
      {
        $categoryTree->createRoot($this->getObject());
      }
      else
      {
        $this->getObject()->getNode()->makeRoot($this->getObject()->getId());
      }
    }
  }
  
}