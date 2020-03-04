<?php

class Database {
    
    //db parameter
    private $host = '68.183.177.133';
    private $db_name = 'smart_toilet';
    private $username = 'root';
    private $password = 'Db#SmartToilet#1234';
    private $conn ;

    //db connect
    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name , 
                $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'Connection Error' . $e->getMessage();
        }

        return $this->$conn;
    }
}

?>