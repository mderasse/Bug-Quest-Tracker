<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins(array(
      'sfDoctrinePlugin',
      'sfFormExtraPlugin',
      'sfDoctrineGuardPlugin',
      'sfTaskExtraPlugin',
      'csDoctrineActAsSortablePlugin',
      'sfCKEditorPlugin',
    ));
    
    $this->dispatcher->connect('context.load_factories', array($this, 'listenToLoadFactoriesEvent'));
  }
  
  public function listenToLoadFactoriesEvent(sfEvent $event)
  {
    BaseForm::setUser($event->getSubject()->getUser());
  }
  
}
