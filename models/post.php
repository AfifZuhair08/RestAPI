<?php

class Post{

    //db stuff
    private $conn;
    private $table = 'posts';

    //FOR REFERNCES FROM READ
    // $post_item = array(
    //     'userID' => $userID,
    //     'fullName' => $fullName,
    //     'lastName' => $lastName,
    //     'email' => $email,
    //     'dateRegistered' => $dateRegistered,
    //     'username' => $username,
    // );

    //post properties
    public $userID;
    public $fullName;
    public $lastName;
    public $email;
    public $dateRegistered;
    public $username;

    //contructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    //get posts
    public function read(){

        //create query
        $query = 'SELECT
                u.userID,
                u.fullName,
                u.lastName,
                u.email,
                u.dateRegistered,
                u.username,
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