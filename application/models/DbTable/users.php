<?php

class Application_Model_DbTable_users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    
    public function getusers($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if(!$row) {
            throw new Exception("Нет записи с id - $id");
        }
        return $row->toArray();
    }
    
     public function mailusers($id,$title)
    {
        $mov = new Application_Model_DbTable_users();
            $where='id='.$id;
            /*echo $mov->fetchrow($where)->$title;*/
        return $mov->fetchrow($where)->$title;
    }
    
 public function insertaut($name,$username,$image,$citi,$password,$data_bith)
 {
     
    $data = array(
        'name'=>$name,
            'username' => $username,
            'image' => $image,
            'citi'=>$citi,
            'password'=>$password,
            'role'=>'admin',
            'data_bith'=>$data_bith,
        );
        $this->insert( $data );
 }
} 
?>
