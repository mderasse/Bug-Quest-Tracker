<?php

/**
 * sfGuardUser module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage sfGuardUser
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSfGuardUserGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%=username%% - %%created_at%% - %%updated_at%% - %%last_login%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'User list';
  }

  public function getEditTitle()
  {
    return 'Editing User "%%username%%"';
  }

  public function getNewTitle()
  {
    return 'New User';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array(  'User' =>   array(    0 => 'first_name',    1 => 'last_name',    2 => 'email_address',    3 => 'username',    4 => 'password',    5 => 'password_again',  ),  'Permissions and groups' =>   array(    0 => 'is_active',    1 => 'is_super_admin',    2 => 'groups_list',    3 => 'permissions_list',  ),);
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => '=username',  1 => 'created_at',  2 => 'updated_at',  3 => 'last_login',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'first_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'last_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'email_address' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'username' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'algorithm' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'salt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'password' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'is_active' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'is_super_admin' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'last_login' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'groups_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'permissions_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'password_again' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Password (again)',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'email_address' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'last_login' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'groups_list' => array(),
      'permissions_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'sfGuardUserAdminForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'sfGuardUserFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
