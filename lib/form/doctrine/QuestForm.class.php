<?php

/**
 * Quest form.
 *
 * @package    Bug Quest Tracker
 * @subpackage form
 * @author     Matthieu Mystick Derasse
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuestForm extends BaseQuestForm
{
  public function configure()
  {
    if(!$this->isNew())
    {
      $this->removeFields();
    }
  }
  public function doBind(array $values)
  {
    $values['id'] = $this->getOption('idquest');
    
    parent::doBind($values);
  }
  public function removeFields()
  {
    unset(
      $this['name_id'], $this['type'], $this['zone_id'], $this['race']
    );
  }
}
