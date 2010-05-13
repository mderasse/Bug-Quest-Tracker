<?php

  require_once dirname(__FILE__).'/../../../bootstrap/unit.php';
  
  $configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);
  new sfDatabaseManager($configuration);
  Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/test');
  
  /**
   * Test a page with doctrine method.
   */
   
  $a = new lime_test(22);
  
  $a->comment('->fetchOne()');
  $page = Doctrine_Core::getTable('peanutPage')->createQuery()->fetchOne();

  $a->ok($page->getId(), '->getId() return true');
  $a->ok($page->getTitle(), '->getTitle() return true');
  $a->ok($page->getExcerpt(), '->getExcerpt() return true');
  $a->ok($page->getAuthor(), '->getAuthor() return true');
  $a->ok($page->getStatus(), '->getStatus() return true');
  $a->ok($page->getType(), '->getType() return true');
  $a->ok($page->getSlug(), '->getSlug() return true');
  $a->ok($page->getCreatedAt(), '->getCreatedAt() return true');
  $a->ok($page->getUpdatedAt(), '->getUpdatedAt() return true');
  
  $a->is($page->getId(), '1', '->getId() return 1');
  $a->is($page->getTitle(), 'Titre', '->getId() return Titre');
  $a->is($page->getExcerpt(), 'Excerpt', '->getId() return Excerpt');
  $a->is($page->getAuthor(), '1', '->getAuthor() return Author');
  $a->is($page->getStatus(), 'publish', '->getStatus() return Status');
  $a->is($page->getType(), 'singlepage', '->getType() return Type');
  $a->is($page->getSlug(), 'titre', '->getSlug() return titre');
  $a->is($page->getCreatedAt(), '2010-03-10 00:00:00', '->getId() return created_at');
  $a->is($page->getUpdatedAt(), '2010-03-17 20:29:03', '->getId() return updated_at');
  
  $a->isnt($page->getStatus(), 'draft', '->getStatus() draft isnt the good value');
  $a->isnt($page->getType(), 'homepage', '->getType() homepage isnt the good value');
  $a->isnt($page->getCreatedAt(), '2010-03-10', '->getCreatedAt() isnt a timestamp');
  $a->isnt($page->getStatus(), 'salut', '->getStatus() draft isnt the good value');
  
  
  /**
   * Test a page object by id and status.
   *
   * @param  int $id The id of the page
   * @param  string $status The page's status
   *
   * @return peanutPage
   */
   
  $b = new lime_test(6);
  $b->comment('->getById()');
  $page = Doctrine_Core::getTable('peanutPage')->getById('1');
  
  $b->ok($page, true);
  $b->is($page->getId(), '1', '->getId() return 1');
  $b->isnt($page->getStatus(), 'draft', '->getStatus() isnt draft');
  
  
  $page = Doctrine_Core::getTable('peanutPage')->getById('2', $status = 'draft');
  
  $b->ok($page, true);
  $b->is($page->getId(), '2', '->getId() return 2');
  $b->isnt($page->getStatus(), 'publish', '->getStatus() isnt publish');
  
  
  /**
   * Test a page object by slug and status.
   *
   * @param  int $slug The slug of the page
   * @param  string $status The page's status
   *
   * @return peanutPage
   */
   
  $c = new lime_test(3);
  $c->comment('->getBySlug()');
  $page = Doctrine_Core::getTable('peanutPage')->getBySlug('titre');
  
  $c->ok($page, true);
  $c->is($page->getSlug(), 'titre', '->getId() return titre');
    
  $page = Doctrine_Core::getTable('peanutPage')->getBySlug('oups');
  
  $c->isnt($page, true, '->getSlug(\'oups\') doesnt exist');
  
  
  /**
   * Test a page object by atuhor and status.
   *
   * @param  int $slug The slug of the page
   * @param  string $status The page's status
   *
   * @return peanutPage
   */
   
  $d = new lime_test(2);
  $d->comment('->getByAuthor()');
  $page = Doctrine_Core::getTable('peanutPage')->getByAuthor('1');
  
  $d->is($page->getAuthor(), '1', '->getAuthor() return 1');
  
  
  $page = Doctrine_Core::getTable('peanutPage')->getByAuthor('2');
  
  $d->isnt($page, true, '->getAuthor(\'2\') doesnt exist');