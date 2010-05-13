<?php

require_once dirname(__FILE__).'/../lib/pageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pageGeneratorHelper.class.php';

/**
 * page actions.
 *
 * @package    peanut
 * @subpackage page
 * @author     Alexandre pocky BALMES
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends autoPageActions
{
  public function executePromote()
  {
    $object=Doctrine::getTable('peanutPage')->findOneById($this->getRequestParameter('id'));
   
   
    $object->promote();
    $this->redirect("@peanut_page");
  }
   
  public function executeDemote()
  {
    $object=Doctrine::getTable('peanutPage')->findOneById($this->getRequestParameter('id'));
   
    $object->demote();
    $this->redirect("@peanut_page");
  }
}
