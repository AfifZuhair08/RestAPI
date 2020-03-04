<?php

class Post{

    //db stuff
    private $conn;
    private $table = 'posts';

    //post properties
    public $userID;
    public $fname;
    public $lname;
    public $email;
    public $date;
    public $username;
    public $password;

    //contructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    //get posts
    public function read(){

        //create query
        $query = 'SELECT
                u.userID,
                u.fname,
                u.lname,
                u.email,
                u.username,
                u.password 
                FROM
                '. $this->table . '
                ORDER BY u.date DESC';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }
}
?>