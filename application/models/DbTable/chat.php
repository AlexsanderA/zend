<?php

class Application_Model_DbTable_chat extends Zend_Db_Table_Abstract
{
    protected $_name = 'chat';
    
    public function getusers($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if(!$row) {
            throw new Exception("Нет записи с id - $id");
        }
        return $row->toArray();
    }
    
    
    public function addchat($text,$id_polych, $id_user)
    {
        $data = array(
            'text'=>$text,
            'id_polych' => $id_polych,
            'id_user' => $id_user,
        );
        $this->insert( $data );
    }  
    
     public function deletechat($id)
    {
        $where = 'id = ' . $id;
        $this->delete($where);
    }
} 

?>
