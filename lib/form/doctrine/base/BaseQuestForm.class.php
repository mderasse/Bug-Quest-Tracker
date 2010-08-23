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
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Trad'), 'add_empty' => false)),
      'type'       => new sfWidgetFormInputText(),
      'zone_id'    => new sfWidgetFormInputText(),
      'race'       => new sfWidgetFormInputText(),
      'status_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'add_empty' => true)),
      'comment_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Trad'))),
      'type'       => new sfValidatorString(array('max_length' => 50)),
      'zone_id'    => new sfValidatorString(array('max_length' => 150)),
      'race'       => new sfValidatorString(array('max_length' => 150)),
      'status_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'required' => false)),
      'comment_id' => new sfValidatorInteger(array('required' => false)),
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
