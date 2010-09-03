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
   if($request->getParameter('quest'))
   {
     $this->pager->setQuery(Doctrine::getTable('Quest')->createQuery('a')->where('type=?', $request->getParameter('quest'))->orWhere('race=?', $request->getParameter('quest'))->orWhere('status_id=?', $request->getParameter('quest')));
   }
   else
   {
     $this->pager->setQuery(Doctrine::getTable('Quest')->createQuery('a'));
   }
   $this->pager->setPage($request->getParameter('page', 1));
   $this->pager->init();
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->quest = Doctrine::getTable('Quest')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->quest);
    if($this->getUser()->hasCredential('ChangeStatus'))
    {
      $this->formquest = new QuestForm($this->quest);
    }
    if($this->getUser()->hasCredential('AddComments'))
    {
      $this->form = new CommentsForm();
    }
  }
  public function executeSearch(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'quest', 'index');
    $this->pager = new sfDoctrinePager('Quest', 25);
    $query = $request->getParameter('query');
    $q= Doctrine_Query::create()
      ->from('Quest u')
      ->leftJoin('u.Translate h')
      ->leftJoin('u.Zone j')
      ->leftJoin('u.Status i')
      ->where('h.name_fr LIKE "%'.$query.'%"')
      ->orWhere('i.name LIKE "'.$query.'"')
      ->orWhere('u.id LIKE "'.$query.'"')
      ->orWhere('u.type LIKE "'.$query.'"')
      ->orWhere('u.race LIKE "'.$query.'"')
      ->orWhere('j.name_fr LIKE "'.$query.'"');
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  public function executeCreatecomments(sfWebRequest $request)
  {
    $this->quest = Doctrine::getTable('Quest')->find(array($request->getParameter('id')));
    if ($this->getUser()->hasCredential('AddComments'))
    {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      $this->formquest = new QuestForm($this->quest);
      $this->form = new CommentsForm(array(), array('idquest' => $request->getParameter('id')));

      $this->processFormComments($request, $this->form);
    }
    $this->setTemplate('show');
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
    $this->quest = Doctrine::getTable('Quest')->find(array($request->getParameter('id')));
    $this->formquest = new QuestForm($quest, array('idquest' => $request->getParameter('id')));
    if($this->getUser()->hasCredential('AddComments'))
    {
      $this->form = new CommentsForm();
    }
    $this->processForm($request, $this->formquest);

    $this->setTemplate('show');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $quest = $form->save();

      $this->redirect('quest/show?id='.$quest->getId());
    }
  }
  protected function processFormcomments(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $comments = $form->save();

      $this->redirect('quest/show?id='.$comments->getQuestId());
    }
  }
}
