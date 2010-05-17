<?php

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

  static protected $user = null;
  
  static protected function getUser()
  {
    return self::$user;
  }
  
  static public function getValidUser()
  {
    if (!self::$user instanceof sfBasicSecurityUser)
    {
      throw new RuntimeException('No valid user instance available');
    }
    
    return self::$user;
  }
 
  static public function setUser(sfBasicSecurityUser $user)
  {
    self::$user = $user;
  }
  
}
