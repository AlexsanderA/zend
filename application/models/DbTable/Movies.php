<?php

class Application_Model_DbTable_Movies extends Zend_Db_Table_Abstract
{
    protected $_name = 'movies';
    
    public function getMovie($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if(!$row) {
            throw new Exception("Нет записи с id - $id");
        }
        return $row->toArray();
    }
    
    public function addMovie($director, $title)
    {
        $data = array(
            'director' => $director,
            'title' => $title,
        );
        $this->insert($data);
    }
    
    public  function updateMovie($id, $director, $title)
    {
        $data = array(
            'director' => $director,
            'title' => $title,
        );
        
        $this->update($data, 'id = ' . (int)$id);
    }
    
    public function deleteMovie($id)
    {
        
         $this->delete('id = ' . (int)$id);
 
    }
}