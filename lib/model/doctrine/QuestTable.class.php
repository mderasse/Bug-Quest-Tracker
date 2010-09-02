<?php


class QuestTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Quest');
    }
    static public function getLuceneIndex()
    {
      ProjectConfiguration::registerZend();
     
      if (file_exists($index = self::getLuceneIndexFile()))
      {
        return Zend_Search_Lucene::open($index);
      }
      else
      {
        return Zend_Search_Lucene::create($index);
      }
    }
     
    static public function getLuceneIndexFile()
    {
      return sfConfig::get('sf_data_dir').'/index.'.sfConfig::get('sf_environment').'.index';
    }
    public function getForLuceneQuery($query)
    {
      $hits = self::getLuceneIndex()->find($query);
     
      $pks = array();
      foreach ($hits as $hit)
      {
        $pks[] = $hit->pk;
      }
     
      if (empty($pks))
      {
        return array();
      }
     
      $q = $this->createQuery('j')
        ->whereIn('j.id', $pks)
        ->limit(30);
     
      return $q->execute();
    }
}
