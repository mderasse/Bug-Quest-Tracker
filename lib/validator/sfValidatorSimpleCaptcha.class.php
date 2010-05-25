<?php

/**
 * sfWidgetFormSimple renders a simple captcha widget.
 *
 *
 * @package    peanut
 * @subpackage validator
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com>
 */
 
  class sfValidatorSimpleCaptcha extends sfValidatorBase
  {
    /**
     * Configures the current validator.
     *
     * Available options:
     *
     *  * first_number:   The first number
     *  * last_number:    The last number
     *
     * @see sfValidatorBase
     */
    
    public function configure($options = array(), $messages = array())
    {
      $this->addOption('first_number');
      $this->addOption('last_number');
      
      $this->addMessage('captcha', 'The captcha is not valid (%error%).');
    }
    
    /**
     * Cleans the input value.
     *
     * The input value must be numeric.
     *
     * It returns null or throw error.
     *
     * @see sfValidatorBase
     */
    protected function doClean($value)
    { 
      if(!is_numeric($value) || is_null($value))
      {
        throw new sfValidatorError($this, 'captcha', array('error' => 'This is not a number!'));
      }
      
      if(!$this->check($value))
      {
        throw new sfValidatorError($this, 'captcha', array('error' => 'bad result!'));
      }
      else
      {
        return null;
      }
    }
    
    /**
     * Returns true if the captcha is valid.
     *
     * @param  string input value for captcha
     *
     * @return Boolean true if the captcha is valid, false otherwise
     */
    protected function check($value)
    {
      $first_number = $this->getOption('first_number');
      $last_number = $this->getOption('last_number');
      
      $math = $first_number + $last_number;
      
      if($math == $value)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  }
   
   