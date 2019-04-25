<?php 


class Posts{

	public $title,$message,$PDO;


	public function __construct(){


		try {
			$this->PDO = new PDO("mysql:host=127.0.0.1;dbname=blog", 'root', '');
		    $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {
			echo 'Something went wrong ' . $e->getMessage();
		}	

	}

	public function save($input){

		try {
			$stmt =	$this->PDO->prepare("INSERT INTO posts(title,message,posted) VALUES (?,?,NOW())");
			$stmt->execute($input); 		
			
		} catch (PDOException $e) {
			echo 'Something went wrong ' . $e->getMessage();
		}

	}

	public static function print_object($array){

		if(is_object($array) || is_array($array)){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
		}
		else echo 'This is not an object!';
	}

	public function Fetch(){

		 $stmt = $this->PDO->prepare('SELECT * FROM posts');
		 $stmt->execute();
		 return $stmt->fetchAll(PDO::FETCH_OBJ);

	}

	public function FetchOne($id){

		 $stmt = $this->PDO->prepare("SELECT * FROM posts WHERE id = $id");
		 $stmt->execute();
		 return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

}