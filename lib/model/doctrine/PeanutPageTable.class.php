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
    
    static public $status = array(
    	'draft'		=> 'Draft',
    	'publish'	=> 'Publish',
    );
    
    public function getStatus() {
    	return self::$status;
    }
    
    
    /**
     * Retrieves a page object by id and status.
     *
     * @param  int $id The id of the page
     * @param  string $status The page's status
     *
     * @return peanutPage
     */
     
    public function getWhereId($id)
    {
      $p = $this->createQuery('p')
        ->leftJoin('p.sfGuardUser s')
        ->where('p.id = ?', $id);
        
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
     
    public function getWhereSlug($slug)
    {
      $p = $this->createQuery('p')
        ->leftJoin('p.sfGuardUser s')
        ->where('p.slug = ?', $slug);
        
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
     
    public function getAllWhereAuthor($author)
    {
      $p = $this->createQuery('p')
        ->leftJoin('p.sfGuardUser s')
        ->where('p.author = ?', $author)
        ->orWhere('s.username = ?', $author)
        ->orderBy('p.position DESC');
        
      return $p->execute(array(), Doctrine_Core::HYDRATE_RECORD);
    }
    
    /**
     * Retrieves a page object by author and status.
     *
     * @param  int $slug The slug of the page
     * @param  string $status The page's status
     *
     * @return peanutPage
     */
     
    public function getAll($status = 'publish')
    {
      $p = $this->createQuery('p')
        ->leftJoin('p.sfGuardUser s')
        ->andWhere('p.status = ?', $status)
        ->orderBy('p.position ASC');
        
      return $p->execute(array(), Doctrine_Core::HYDRATE_RECORD);
    }
      
  }