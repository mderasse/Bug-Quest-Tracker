<?php

/**
 * ClientString filter form base class.
 *
 * @package    Bug Quest Tracker
 * @subpackage filter
 * @author     Matthieu Mystick Derasse
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClientStringFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Questname'), 'add_empty' => true)),
      'name_fr' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Questname'), 'column' => 'id')),
      'name_fr' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client_string_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientString';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'name'    => 'ForeignKey',
      'name_fr' => 'Text',
    );
  }
}
