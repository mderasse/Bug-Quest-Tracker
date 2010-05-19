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
    
    unset($this['position']);
    
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

    $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
    	'choices'	=> Doctrine::getTable('PeanutPage')->getStatus(),
    	'expanded'	=> false,
    ));
    
    if(!$this->isNew()) {
      $this->widgetSchema['created_at'] = new sfWidgetFormI18nDate(array(
        'culture' => $user->getCulture(),
      ));

      $this->widgetSchema['updated_at'] = new sfWidgetFormI18nDate(array(
        'culture' => $user->getCulture(),
      ));
    }
    else
    {
      unset($this['created_at']);
    }
    
    
  }
}
