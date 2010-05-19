<?php

/**
 * page actions.
 *
 * @package    peanut
 * @subpackage page
 * @author     Alexandre pocky BALMES
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->peanut_page = Doctrine::getTable('peanutPage')->getFirstPage();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->peanut_page = $this->getRoute()->getObject();
    $this->forward404Unless($this->peanut_page);
  }

  
}
