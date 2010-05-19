<?php

/**
 * page actions.
 *
 * @package    peanut
 * @subpackage page
 * @author     Alexandre pocky BALMES
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageComponents extends sfComponents
{
  public function executeMenu(sfWebRequest $request)
  {
    $this->peanut_pages = Doctrine::getTable('peanutPage')->getAll();
  }

  
}
