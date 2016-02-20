
<?php

class Application_Model_DbTable_mails extends Zend_Db_Table_Abstract
{
    protected $_name = 'mails';
    protected $_user= array('Model_users');
    
    public function getmails($id,$title)
    {
         $mov = new Application_Model_DbTable_users();
            $where='id='.$id;
            /*echo $mov->fetchrow($where)->$title;*/
        return $mov->fetchrow($where)->$title;
    }    
    public function getPendingProjects(){
 
    $data = $this->mails;
 
    return $data->fetchAll();
        }
        
        
        
      public function addmails( $text,$statys, $title, $poluchatel, $otpravitel)
    {
        $data = array(
            'text'=>$text,
            'statys' => $statys,
            'title' => $title,
            'polychatel'=>$poluchatel,
            'otpravitel'=>$otpravitel,
        );
        $this->insert( $data );
    }  
    
    public  function updatemails($id)
    {
       
       $this->update(array('statys' => '0'),'id='.$id);
    }
      
    public function deletemails($id)
    {
        $where = 'id = ' . $id;
        $this->delete($where);
    }
    
    } 
    
?>


