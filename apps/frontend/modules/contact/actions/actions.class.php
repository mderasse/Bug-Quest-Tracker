<?php

/**
 * contact actions.
 *
 * @package    peanut
 * @subpackage contact
 * @author     Alexandre pocky BALMES
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ContactForm();
    
    if ($request->isMethod('post'))
    {
    	$this->form->bind($request->getParameter('contact'));
    	
    	if ($this->form->isValid())
    	{
    		try
    		{
    			$body = $this->getPartial('contact/mailTextBody',  array(
    				'name' => $this->form->getValue('name'),
    				'email' => $this->form->getValue('email'),
    				'message' => $this->form->getValue('message'),
    			 ));
    			 
    			 
    			 $altbody = $this->getPartial('contact/mailTextAltBody',  array(
    				'name' => $this->form->getValue('name'),
    				'email' => $this->form->getValue('email'),
    				'message' => $this->form->getValue('message'),
    			 ));
    			 
    			$message = $this->getMailer();
    			
    			$message = Swift_Message::newInstance()
    			  ->setFrom(array(sfConfig::get('app_mail_site') => 'Formulaire de contact peanut'))
    			  ->setTo(array(sfConfig::get('app_mail_contact') => 'Webmaster peanut'))
    				->setSubject('Nouveau message depuis le formulaire de contact')   				
    				->setBody($body, 'text/html')
    				->addPart($altBody, 'text/plain');
  	  				
  	  		$this->getMailer()->send($message);
    		
    		}
    		
    		catch (Exception $e)
    		{
    		  $this->getUser()->setFlash('error', 'An error has occured while send your message!');
    		}
    		
    		$this->redirect('contact/thankyou.html?'.http_build_query($this->form->getValues()));
      }
    }
  }
  
      
  public function executeThankyou()
  {
  }
  
}
