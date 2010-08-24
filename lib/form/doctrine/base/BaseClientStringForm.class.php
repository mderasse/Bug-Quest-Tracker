<?php

/**
 * ClientString form base class.
 *
 * @method ClientString getObject() Returns the current form's model object
 *
 * @package    Bug Quest Tracker
 * @subpackage form
 * @author     Matthieu Mystick Derasse
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClientStringForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Questname'), 'add_empty' => false)),
      'name_fr' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Questname'))),
      'name_fr' => new sfValidatorString(array('max_length' => 500)),
    ));

    $this->widgetSchema->setNameFormat('client_string[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientString';
  }

}
