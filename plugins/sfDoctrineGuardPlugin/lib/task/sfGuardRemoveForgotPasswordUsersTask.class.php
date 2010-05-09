<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Remove old forgot users.
 *
 * @package    symfony
 * @subpackage task
 * @author     Alexandre BALMES <albalmes@gmail.com>
 */
class sfGuardForgotPasswordTask extends sfBaseTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', null),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
    ));

    $this->namespace = 'guard';
    $this->name = 'remove-forgot-users';
    $this->briefDescription = 'Remove all forgot password since 24 hours';

    $this->detailedDescription = <<<EOF
The [guard:remove-forgot-users|INFO] task remove all forgot password since 24 hours:

  [./symfony guard:remove-forgot-users |INFO]
EOF;
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);

    $p = Doctrine_Core::getTable('sfGuardForgotPassword')
      ->createQuery('p')
      ->delete()
      ->where('p.expires_at <= NOW()');
      
    $result = $p->execute();

    $this->logSection('guard', sprintf('Delete %s forgot users', count($result)));
  }
}