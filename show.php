<?php 

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing our api
include_once('initialize.php');

//instantiate post
$post = new Message($db);

$post->room = isset($_GET['room']) && !empty($_GET['room']) ? $_GET['room'] : "";

//blog post query
$result = $post->read();

//get the row count
$num = $result->rowCount();

if($num > 0) {
	$post_arr = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$post_item = array(
			'id'   => $id,
			'user' => $user,
			'body' => html_entity_decode($body),
			'room' => $room,
			'sent' => $sent
		);
		array_push($post_arr, $post_item);
	}

	//convert to JSON and output
	echo json_encode($post_arr);
} else {
	echo json_encode(array('message' => 'No messages found.'));
}

 ?>