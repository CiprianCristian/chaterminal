<?php

class Message {
	//db stuff
	private $conn;
	private $table = 'hah too private to put here';

	//post properties
	public $id;
	public $user;
	public $body;
	public $room;
	public $sent;

	//constructor with
	public function __construct($db) {
		$this->conn = $db;
	}

	//getting posts from our database
	public function read() {
		//create query
		$query = 'SELECT * FROM ' . $this->table . ' m WHERE room = :room ORDER BY m.sent DESC';

		//prepare statement
		$stmt = $this->conn->prepare($query);
		
        //clean data
        $room = htmlspecialchars(strip_tags($this->room));
        
        //binding of parameters
        $stmt->bindParam(':room', $room);
        
        //execute query
        $stmt->execute();
        
        return $stmt;
	}

	//create post function
	public function create() {
		//create query
		if (empty($this->body))
		    return false;
		$query = 'INSERT INTO ' . $this->table . ' 
		SET 
		user = :user, 
		body = :body, 
		room = :room,
		sent = :sent';

		//prepare statement
		$stmt = $this->conn->prepare($query);

		//clean data
		$this->user = htmlspecialchars(strip_tags($this->user));
		$this->body = htmlspecialchars(strip_tags($this->body));
		$this->room = htmlspecialchars(strip_tags($this->room));
		
		date_default_timezone_set('Europe/Bucharest');
        $date = date("Y-m-d G:i:s");
        $this->sent = htmlspecialchars(strip_tags($date));

		//binding of parameters
		$stmt->bindParam(':user', $this->user);
		$stmt->bindParam(':body', $this->body);
		$stmt->bindParam(':room', $this->room);
		$stmt->bindParam(':sent', $this->sent);

		//execute the query
		if($stmt->execute()) {
			return true;
		}

		//print error if something goes wrong
		printf("Error %s. \n", $stmt->error);
		return false;
	}

/*
	//getting a single post from db
	public function read_single() {
		//create query
		$query = 'SELECT
		*
		FROM
		'.$this->table.' 
		m WHERE m.id = ? LIMIT 1';

		//prepare statement
		$stmt = $this->conn->prepare($query);
		//binding param
		$stmt->bindParam(1, $this->id);
		//execute query
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->user = $row['user'];
		$this->body = $row['body'];
		$this->room = $row['room'];
		$this->sent = $row['sent'];

		//return $stmt;
	}

	//update post function
	public function update() {
		//create query
		$query = 'UPDATE ' . $this->table . ' 
		SET
		user = :user, 
		body = :body, 
		room = :room 
		WHERE id = :id';

		//prepare statement
		$stmt = $this->conn->prepare($query);

		//clean data
		$this->user	= htmlspecialchars(strip_tags($this->user));
		$this->body	= htmlspecialchars(strip_tags($this->body));
		$this->room	= htmlspecialchars(strip_tags($this->room));

		//binding of parameters
		$stmt->bindParam(':user', $this->user);
		$stmt->bindParam(':body', $this->body);
		$stmt->bindParam(':room', $this->room);

		//execute the query
		if($stmt->execute()) {
			return true;
		}

		//print error if something goes wrong
		printf("Error %s. \n", $stmt->error);
		return false;
	}

	//delete function
	public function delete() {
		//create query
		$query ='DELETE FROM ' . $this->table . ' WHERE id = :id';

		//prepare statement
		$stmt = $this->conn->prepare($query);

		//clean the data
		$this->id = htmlspecialchars(strip_tags($this->id));
		$stmt->bindParam(':id', $this->id);

		//execute the query
		if($stmt->execute()) {
			return true;
		}

		//print error if something goes wrong
		printf("Error %s. \n", $stmt->error);
		return false;
	}
*/
}

 ?>