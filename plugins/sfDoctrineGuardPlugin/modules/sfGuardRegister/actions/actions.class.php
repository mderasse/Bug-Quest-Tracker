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
      $user = $this->getRoute()->getObject();
      $csrf = sfConfig::get('sf_csrf_secret');
      
      $user = Doctrine::getTable('sfGuardUser')->retrieveByUsername($user->getUsername(), $isActive = false);
      
      if($user)
      {
      
        $check = sha1($user->getUsername().$csrf.$user->getEmailAddress());
        
        if($this->getRequestParameter('unique') === $check)
        {
          
          $max = sfConfig::get('app_sf_guard_plugin_max_days_for_register_confirmation', '14');
          $max = strtotime('-'.$max.' day');
  
          $regDate = strtotime($user->getCreatedAt());
          
          if($regDate >= $max)
          {
            $user->setIsActive(true);
    				$this->getUser()->signIn($user);
    				$this->getUser()->setFlash('notice', 'Votre compte a bien été activé');
  		      $this->redirect('@homepage');        
          }
          else
          {
            $user = Doctrine::getTable('sfGuardUser')->deleteUser($user->getId());
            $this->getUser()->setFlash('error', 'Le délai d\'expiration de votre compte à été dépassé');
            $this->redirect('sf_guard_register');   
          }
          
        }   
        else      
        {
          $this->getUser()->setFlash('error', 'Votre lien de confirmation n\'est pas valide');
          $this->redirect('@homepage');  
        }
      
     }
     else
     {
       $this->getUser()->setFlash('error', 'Votre compte est déjà activé');
       $this->redirect('@homepage');  
     }
  }
  
}