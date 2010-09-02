<?php

/**
 * Quest form base class.
 *
 * @method Quest getObject() Returns the current form's model object
 *
 * @package    Bug Quest Tracker
 * @subpackage form
 * @author     Matthieu Mystick Derasse
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuestForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'name_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Translate'), 'add_empty' => true)),
      'type'      => new sfWidgetFormInputText(),
      'zone_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zone'), 'add_empty' => true)),
      'race'      => new sfWidgetFormInputText(),
      'status_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Translate'), 'required' => false)),
      'type'      => new sfValidatorString(array('max_length' => 50)),
      'zone_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zone'), 'required' => false)),
      'race'      => new sfValidatorString(array('max_length' => 150)),
      'status_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('quest[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quest';
  }

}
