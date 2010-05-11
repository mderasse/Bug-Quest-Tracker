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
    $this->peanut_pages = Doctrine::getTable('PeanutPage')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->peanut_page = Doctrine::getTable('PeanutPage')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->peanut_page);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PeanutPageForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PeanutPageForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($peanut_page = Doctrine::getTable('PeanutPage')->find(array($request->getParameter('id'))), sprintf('Object peanut_page does not exist (%s).', $request->getParameter('id')));
    $this->form = new PeanutPageForm($peanut_page);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($peanut_page = Doctrine::getTable('PeanutPage')->find(array($request->getParameter('id'))), sprintf('Object peanut_page does not exist (%s).', $request->getParameter('id')));
    $this->form = new PeanutPageForm($peanut_page);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($peanut_page = Doctrine::getTable('PeanutPage')->find(array($request->getParameter('id'))), sprintf('Object peanut_page does not exist (%s).', $request->getParameter('id')));
    $peanut_page->delete();

    $this->redirect('page/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $peanut_page = $form->save();

      $this->redirect('page/edit?id='.$peanut_page->getId());
    }
  }
}
