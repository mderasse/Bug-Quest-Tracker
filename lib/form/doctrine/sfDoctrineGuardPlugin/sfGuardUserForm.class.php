<?php

/**
 * sfGuardUser form.
 *
 * @package    peanut
 * @subpackage form
 * @author     Alexandre pocky BALMES
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
    
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
    $this->setLabels();
    $this->removeFields();
  }  
    
  public function setLabels()
  {
    $this->widgetSchema->setLabels(array(
      'email_address' => 'Email address',
      'password' => 'New Password :',));
  }
  public function removeFields()
  {
    unset(
      $this['created_at'], $this['updated_at'], $this['id'], $this['first_name'], $this['last_name'], $this['username'], $this['algorithm'], $this['salt'], $this['is_active'], $this['is_super_admin'],
      $this['last_login'], $this['permissions_list'], $this['groups_list']
    );
  }
}
