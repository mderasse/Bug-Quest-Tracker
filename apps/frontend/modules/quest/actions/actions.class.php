<?php

/**
 * quest actions.
 *
 * @package    Bug Quest Tracker
 * @subpackage quest
 * @author     Matthieu Mystick Derasse
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class questActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
   $this->pager = new sfDoctrinePager('Quest', 25);
   $this->pager->setQuery(Doctrine::getTable('Quest')->createQuery('a'));
   $this->pager->setPage($request->getParameter('page', 1));
   $this->pager->init();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new QuestForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new QuestForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($quest = Doctrine::getTable('Quest')->find(array($request->getParameter('id'))), sprintf('Object quest does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuestForm($quest);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($quest = Doctrine::getTable('Quest')->find(array($request->getParameter('id'))), sprintf('Object quest does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuestForm($quest);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($quest = Doctrine::getTable('Quest')->find(array($request->getParameter('id'))), sprintf('Object quest does not exist (%s).', $request->getParameter('id')));
    $quest->delete();

    $this->redirect('quest/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $quest = $form->save();

      $this->redirect('quest/edit?id='.$quest->getId());
    }
  }
}
