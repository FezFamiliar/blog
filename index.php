<?php 
ini_set('display_errors','1');
include 'config.php';
$t = new Posts();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){
		$t->save(array($_POST['title'],$_POST['message']));
	}

?>


<a href="post.php">Create a new post</a>
<br>
<a href="view.php">View list of posts</a>
