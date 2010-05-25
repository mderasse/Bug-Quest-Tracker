<?php

  require_once dirname(__FILE__).'/../../../bootstrap/unit.php';
  
  $configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);
  new sfDatabaseManager($configuration);
  Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/test');
  
  /**
   * Test a page with doctrine method.
   */
   
  $t = new lime_test(19);
  
  $t->comment('->fetchOne()');
  $page = Doctrine_Core::getTable('peanutPage')->createQuery()->fetchOne();

  $t->ok($page->getId(), '->getId() return true');
  $t->ok($page->getTitle(), '->getTitle() return true');
  $t->ok($page->getExcerpt(), '->getExcerpt() return true');
  $t->ok($page->getAuthor(), '->getAuthor() return true');
  $t->ok($page->getStatus(), '->getStatus() return true');
  $t->ok($page->getSlug(), '->getSlug() return true');
  $t->ok($page->getCreatedAt(), '->getCreatedAt() return true');
  $t->ok($page->getUpdatedAt(), '->getUpdatedAt() return true');
  
  $t->is($page->getId(), '1', '->getId() return 1');
  $t->is($page->getTitle(), 'Titre', '->getId() return Titre');
  $t->is($page->getExcerpt(), 'Excerpt', '->getId() return Excerpt');
  $t->is($page->getAuthor(), '1', '->getAuthor() return Author');
  $t->is($page->getStatus(), 'publish', '->getStatus() return Status');
  $t->is($page->getSlug(), 'titre', '->getSlug() return titre');
  $t->is($page->getCreatedAt(), '2010-03-10 00:00:00', '->getId() return created_at');
  $t->is($page->getUpdatedAt(), '2010-05-14 00:28:55', '->getId() return updated_at');
  
  $t->isnt($page->getStatus(), 'draft', '->getStatus() draft isnt the good value');
  $t->isnt($page->getCreatedAt(), '2010-03-10', '->getCreatedAt() isnt a timestamp');
  $t->isnt($page->getStatus(), 'salut', '->getStatus() draft isnt the good value');
  
  
  /**
   * Test a page object by id and status.
   *
   * @param  int $id The id of the page
   * @param  string $status The page's status
   *
   * @return peanutPage
   */
   
  $t = new lime_test(6);
  $t->comment('->getById()');
  $page = Doctrine_Core::getTable('peanutPage')->getWhereId('1');
  
  $t->ok($page, true);
  $t->is($page->getId(), '1', '->getId() return 1');
  $t->isnt($page->getStatus(), 'draft', '->getStatus() isnt draft');
  
  
  $page = Doctrine_Core::getTable('peanutPage')->getWhereId('2');
  
  $t->ok($page, true);
  $t->is($page->getId(), '2', '->getId() return 2');
  $t->isnt($page->getStatus(), 'publish', '->getStatus() isnt publish');
  
  
  /**
   * Test a page object by slug and status.
   *
   * @param  string $slug The slug of the page
   * @param  string $status The page's status
   *
   * @return peanutPage
   */
   
  $t = new lime_test(3);
  $t->comment('->getBySlug()');
  $page = Doctrine_Core::getTable('peanutPage')->getWhereSlug('titre');
  
  $t->ok($page, true);
  $t->is($page->getSlug(), 'titre', '->getId() return titre');
    
  $page = Doctrine_Core::getTable('peanutPage')->getWhereSlug('oups');
  
  $t->isnt($page, true, '->getSlug(\'oups\') doesnt exist');
  
  
  /**
   * Test a page object by atuhor and status.
   *
   * @param  int $author The author of the page
   * @param  string $status The page's status
   *
   * @return peanutPage
   */
   
  $t = new lime_test(3);
  $t->comment('->getAllWhereAuthor()');
  $page = Doctrine_Core::getTable('peanutPage')->getAllWhereAuthor('1');
  
  $t->is($page->getFirst()->getAuthor(), '1', '->getAuthor() return 1');
  $t->is($page->getFirst()->getId(), '2', '->getId() return 2 (orderBy position ASC)');
  
  
  $page = Doctrine_Core::getTable('peanutPage')->getAllWhereAuthor('2');
  
  $t->isnt($page, false, '->getAuthor(\'2\') doesnt exist');
  
  
  /**
   * Test a page object by position.
   *
   * @param  int $slug The slug of the page
   * @param  string $status The page's status
   *
   * @return peanutPage
   */
   
   $t = new lime_test(2);
   $t->comment('->getFirstPage');
   $page = Doctrine_Core::getTable('PeanutPage')->getFirstPage();
   
   $t->is($page->getId(), '1', '->getId() return 1');
   
   $page = Doctrine_Core::getTable('PeanutPage')->getFirstPage('draft');
   
   $t->is($page->getId(), '2', '->getId() return 2');