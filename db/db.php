<?php
class db{
    public $connect;
    
     public function __construct($host,$username,$dbpass,$dbname) {
        $this->connect = new mysqli($host,$username,$dbpass,$dbname);
        if($this->connect->connect_error){
            echo"Failed to connect to MySQL - ".$this->connect->connect_error;
            die();
        }
        
    }
    public function select_query($sqlquery){
       
       return $this->fetch_asso($sqlquery);
    }
    public function fetch_asso($sqlquery){
        $result=array();     
        $select_result =$this->connect->query($sqlquery);
        while ($row =$select_result->fetch_assoc() ){
             $result[]=$row;
        }
       return $result; 
    }
    public function insert(){
        $insert_query= $this->get_insert();
        if($this->connect->query($insert_query)==true)  {
            echo"insert successfully";
        } 
        else{
            echo"Failed to connect to MySQL - ".$this->connect->connect_error;
        }     
        
    }
}
 
?>