<?php

//headerd
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/databse.php';
include_once '../../models/post.php';

//instantiate db & connect
$database = new Database();
$db = $database->connect();

//instantiate object
$post = new Post($db);

//post query
$result = $post->read();

//get row count
$num = $result->rowCount();

//check if any post
if($num > 0){

    //post array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'userID' => $userID,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'date' => $date,
            'username' => $username,
            'password' => $password
        );

        //push to data
        array_push($posts_arr['data'], $post_item);
    }

    //turn to JSON & output
    echo json_encode($posts_arr);

} else {
    //no posts
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}

?>