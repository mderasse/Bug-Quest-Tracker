<?php

/**
 * user actions.
 *
 * @package    Bug Quest Tracker
 * @subpackage user
 * @author     Matthieu Mystick Derasse
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sf_guard_user = Doctrine::getTable('sfGuardUser')->find(array($this->getUser()->getGuardUser()->getId())), sprintf('Object sf_guard_user does not exist (%s).', $this->getUser()->getGuardUser()->getId()));
    $this->form = new sfGuardUserForm($sf_guard_user);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sf_guard_user = Doctrine::getTable('sfGuardUser')->find(array($this->getUser()->getGuardUser()->getId())), sprintf('Object sf_guard_user does not exist (%s).', $this->getUser()->getGuardUser()->getId()));
    $this->form = new sfGuardUserForm($sf_guard_user);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sf_guard_user = $form->save();

      $this->redirect('user/edit?id='.$sf_guard_user->getId());
    }
  }
}
