<?php 
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//initializing our api
include_once('initialize.php');

//instantiate post
$post = new Message($db);

$data = json_decode(file_get_contents("php://input"));

//get raw posted data
$post->user = $data->user;
$post->body = $data->body;
$post->room = $data->room;

//create post
if($post->create()) {
	echo json_encode(
		array('message' => 'Post created')
	);
} else {
	echo json_encode(
		array('message' => 'Post not created')
	);
}

?>