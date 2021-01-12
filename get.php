<?php 

//headers
header('Access-Control-Allow-Origin: *');

//initializing our api
include_once('initialize.php');

//instantiate post
$post = new Message($db);

$post->room = isset($_GET['room']) && !empty($_GET['room']) ? htmlspecialchars($_GET['room']) : "";

//blog post query
$result = $post->read();

//get the row count
$num = $result->rowCount();

$post_arr = array();

if($num > 0) {
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$post_item = array(
			'id'   => $id,
			'user' => html_entity_decode($user),
			'body' => html_entity_decode($body),
			'room' => html_entity_decode($room),
			'sent' => $sent
		);
		array_push($post_arr, $post_item);
	}

	//convert to JSON and output
	json_encode($post_arr);
	$arrlength = count($post_arr);
    
    if ($arrlength) {
        for($x = 0; $x < $arrlength; $x++) {
            echo '<div style="display: flex; font-size: inherit; width: 100%; margin: 0 0 1%;">
                <div style="flex-grow: 1; flex-shrink: 1; flex-basis: 100%; word-wrap: break-word; display: flex; font-size: inherit;"><span>> '.$post_arr[$x]['user'].' > '.$post_arr[$x]['body'].'</span></div>
                <div style="flex-grow: 1; flex-shrink: 3; flex-basis: 100%; word-wrap: break-word; display: flex; font-size: 50%; justify-content: flex-end; align-self: center;"><span>'.$post_arr[$x]['sent'].'</span></div>
            </div>';
        }
    }
} else {
    echo '<p>!> There are no messages in this room. Be the first to send one!</p>';
}

 ?>