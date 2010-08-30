<?php

/**
 * Quest filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuestFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Translate'), 'add_empty' => true)),
      'type'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zone_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zone'), 'add_empty' => true)),
      'race'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Translate'), 'column' => 'id')),
      'type'      => new sfValidatorPass(array('required' => false)),
      'zone_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zone'), 'column' => 'id')),
      'race'      => new sfValidatorPass(array('required' => false)),
      'status_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Status'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('quest_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quest';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'name_id'   => 'ForeignKey',
      'type'      => 'Text',
      'zone_id'   => 'ForeignKey',
      'race'      => 'Text',
      'status_id' => 'ForeignKey',
    );
  }
}
