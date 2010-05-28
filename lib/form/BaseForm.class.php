<?php
// lib/form/BaseForm.class.php

/**
 * Base project form.
 * 
 * @package    peanut
 * @subpackage form
 * @author     Alexandre 'pocky' BALMES 
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony
{

  static protected $formUser = null;
  
  static protected function getUser()
  {
    return self::$formUser;
  }
  
  static public function getValidUser()
  {
    if (!self::$formUser instanceof sfBasicSecurityUser)
    {
      throw new RuntimeException('No valid user instance available');
    }
    
    return self::$formUser;
  }
 
  static public function setUser(sfBasicSecurityUser $user)
  {
    self::$formUser = $user;
  }
  
}