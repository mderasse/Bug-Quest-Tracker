<?php

/**
 * sfWidgetFormSimple renders a simple captcha widget.
 *
 *
 * @package    peanut
 * @subpackage validator
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com>
 */
 
class sfValidatorDoctrineChoiceNestedSet extends sfValidatorBase
{
  /**
  * Configures the validator.
  * Available options:
  *   model: The model class (required)
  *   node:   The node being moved (required)
  *
  * @see sfValidatorBase
  */
  
  protected function configure($options = array(), $messages = array())
  {
    $this->addRequiredOption('model');
    $this->addRequiredOption('node');
    
    $this->addMessage('node', 'A node cannot be set as a child of itself!');
  }
  
  protected function doClean($value)
  {
    if(isset($value) && !$value)
    {
      unset($value);
    }
    else
    {
      $targetNode = Doctrine::getTable($this->getOption('model'))->find($value)->getNode();
      if($targetNode->isDescendantOfOrEqualTo($this->getOption('node')))
      {
        throw new sfValidatorError($this, 'node', array('value' => $value));
      }
      
      return $value;
    }
  }
}