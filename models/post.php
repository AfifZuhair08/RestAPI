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

    //get posts
    public function read(){

        //create query
        $query = 'SELECT
                all
                FROM
                '. $this->table .' u
                ORDER BY u.userID DESC';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }
}
?>