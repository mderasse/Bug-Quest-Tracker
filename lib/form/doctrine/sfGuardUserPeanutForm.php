<?php

/**
 * sfGuardUserPeanutForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardUserPeanutForm extends sfGuardUserAdminForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
    if($this->getUser()->hasPermission('webmaster')) {
      unset(
        $this['is_active'],
        $this['is_super_admin']
      );
    }
  }
}

