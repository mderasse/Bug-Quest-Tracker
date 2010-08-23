<?php

/**
 * Quest filter form base class.
 *
 * @package    Bug Quest Tracker
 * @subpackage filter
 * @author     Matthieu Mystick Derasse
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuestFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Trad'), 'add_empty' => true)),
      'type'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zone_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'race'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'add_empty' => true)),
      'comment_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Trad'), 'column' => 'id')),
      'type'       => new sfValidatorPass(array('required' => false)),
      'zone_id'    => new sfValidatorPass(array('required' => false)),
      'race'       => new sfValidatorPass(array('required' => false)),
      'status_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Status'), 'column' => 'id')),
      'comment_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
      'id'         => 'Number',
      'name'       => 'ForeignKey',
      'type'       => 'Text',
      'zone_id'    => 'Text',
      'race'       => 'Text',
      'status_id'  => 'ForeignKey',
      'comment_id' => 'Number',
    );
  }
}
