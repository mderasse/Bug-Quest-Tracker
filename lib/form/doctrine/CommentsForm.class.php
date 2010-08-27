<?php

/**
 * Comments form.
 *
 * @package    Bug Quest Tracker
 * @subpackage form
 * @author     Matthieu Mystick Derasse
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentsForm extends BaseCommentsForm
{
  public function configure()
  {
    $this->removeFields();
  }
  public function doBind(array $values)
  {
    $values['quest_id'] = $this->getOption('idquest');
    
    parent::doBind($values);
  }
  protected function doSave($conn = null)
  {
    $this->values['author_id'] = $this->getUser()->getGuardUser()->getId();

    parent::doSave($conn);
  }
  public function removeFields()
  {
    unset(
      $this['created_at'], $this['updated_at'], $this['author_id']
    );
  }
}
