<?php
class db{
    public $connect;
    
     public function __construct($host,$username,$dbpass,$dbname) {
        $this->connect = new mysqli($host,$username,$dbpass,$dbname);
        if($this->connect->connect_error){
            echo"Failed to connect to MySQL - ".$this->connect->connect_error;
            die();
        }
        else{
            echo"connect successfully";
           // die();
        }
    }
    public function query(){
        $dbquery='Select * from iteam';
        $query = $this->connect->query($dbquery);
        return($query);
    }
    public function fetch_asso($result){
        $asso_result = array();
        while($row = query(fetch_array(MYSQLI_ASSOC))){
            /*foreach($row as $key =>$value){
                echo $value;
             }*/
             $asso_result[]=$row;
             //var_dump($row);
             //die();
        }
        return $asso_result;
        
    }
}

?>