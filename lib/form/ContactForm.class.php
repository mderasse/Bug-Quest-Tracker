<?php

/**
 * Contact form.
 * 
 * @package    peanut
 * @subpackage contact form
 * @author     Alexandre 'pocky' BALMES 
 */
 
 class ContactForm extends BaseForm
 {
   
   public function configure()
   {
     $this->setWidgets(array(
       'name'    => new sfWidgetFormInputText(),
       'email'   => new sfWidgetFormInputText(),
       'message' => new sfWidgetFormTextarea(),
       'captcha' => new sfWidgetFormInputText(),
     ));
     
     $this->widgetSchema->setLabels(array(
     	'name'	  => 'Name',
     	'email'		=> 'Email',
     	'message'	=> 'Your message',
     	'captcha' => '3 + 4 = ?'
     ));
     
     $this->setValidators(array(
     	'name'	  => new sfValidatorString(array('required' => true), array(
     		'required'   => 'Name is required'
     	)),
     	'email'		=> new sfValidatorEmail(array('required' => true), array(
     		'required'   => 'Email is required',
     		'invalid'    => '%value% isn\'t a valid mail!'
     	)),
     	'message'	=> new sfValidatorString(array('min_length' => 4), array(
     		'required'   => 'Message is required',
     		'min_length' => 'Your message is too small (min %min_length% chars).'
     	)),
     	'captcha'	  => new sfValidatorSimpleCaptcha(array(
     	  'required'     => true,
     	  'first_number' => 3,
     	  'last_number'  => 4,
     	), array(
     		'required'     => 'Captcha is required',
     	)),
     ));
     
     $this->widgetSchema->setNameFormat('contact[%s]');
     $this->validatorSchema->setOption('allow_extra_fields', true);
     $this->validatorSchema->setOption('filter_extra_fields', false);
   }
   
 }