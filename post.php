<?php 
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
header('Location: http://chaterminal.rf.gd/?room=' . urlencode($_POST['room']) . '&user=' . urlencode($_POST['user']));

//initializing our api
include_once('initialize.php');

//instantiate post
$post = new Message($db);

$post->user = $_POST["user"];
$post->body = $_POST["body"];
$post->room = $_POST["room"];

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