<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardRegisterActions.class.php';

/**
 * sfGuardRegister actions.
 *
 * @package    guard
 * @subpackage sfGuardRegister
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z jwage $
 */
class sfGuardRegisterActions extends BasesfGuardRegisterActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->getUser()->setFlash('notice', 'You are already registered and signed in!');
      $this->redirect('@homepage');
    }
  
    $this->form = new sfGuardRegisterForm();
  
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $user = $this->form;
        $user->save();
        
        $csrf = sfConfig::get('sf_csrf_secret');
        $unique = sha1($user->getValue('username').$csrf.$user->getValue('email_address'));
        
        $message = Swift_Message::newInstance()
          ->setFrom(sfConfig::get('app_sf_guard_plugin_default_from_email', 'from@noreply.com'))
          ->setTo($user->getValue('email_address'))
          ->setSubject('New account for '.$user->getValue('username'))
          ->setBody($this->getPartial('sfGuardRegister/send_register', array('user' => $user, 'unique' => $unique)))
          ->setContentType('text/html')
        ;
  
        $this->getMailer()->send($message);
        
        
        $this->getUser()->setFlash('notice', 'A confirmation of creation has just been sent on your mailbox');
        $this->redirect('@homepage');
      }
    }
  }
  
  public function executeConfirmation($request)
  {
  
  }
  
}