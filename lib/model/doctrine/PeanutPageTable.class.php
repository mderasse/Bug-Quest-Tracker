<?php

  /**
   * Page table.
   *
   * @package    peanutPage
   * @subpackage model
   * @author     Alexandre BALMES <albalmes@gmail.com>
   */

  class peanutPageTable extends Doctrine_Table
  {
      
    public static function getInstance()
    {
      return Doctrine_Core::getTable('PeanutPage');
    }
    
    /**
     * Retrieves a page object by id and status.
     *
     * @param  int $id The id of the page
     * @param  string $status The page's status
     *
     * @return peanutPage
     */
     
    public function getById($id, $status = 'publish')
    {
      $p = $this->createQuery('p')
        ->leftJoin('p.sfGuardUser s')
        ->where('p.id = ?', $id)
        ->andWhere('p.status = ?', $status);
        
      return $p->fetchOne(array(), Doctrine_Core::HYDRATE_RECORD);
    }
    
    
    /**
     * Retrieves a page object by slug and status.
     *
     * @param  int $slug The slug of the page
     * @param  string $status The page's status
     *
     * @return peanutPage
     */
     
    public function getBySlug($slug, $status = 'publish')
    {
      $p = $this->createQuery('p')
        ->leftJoin('p.sfGuardUser s')
        ->where('p.slug = ?', $slug)
        ->andWhere('p.status = ?', $status);
        
      return $p->fetchOne(array(), Doctrine_Core::HYDRATE_RECORD);
    }
    
    
    /**
     * Retrieves a page object by author and status.
     *
     * @param  int $slug The slug of the page
     * @param  string $status The page's status
     *
     * @return peanutPage
     */
     
    public function getByAuthor($author, $status = 'publish')
    {
      $p = $this->createQuery('p')
        ->leftJoin('p.sfGuardUser s')
        ->where('p.author = ?', $author)
        ->orWhere('s.username = ?', $author)
        ->andWhere('p.status = ?', $status);
        
      return $p->fetchOne(array(), Doctrine_Core::HYDRATE_RECORD);
    }
      
  }