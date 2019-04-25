<?php 
ini_set('display_errors','1');
include 'config.php';
$t = new Posts();
$results = $t->Fetch();

if(isset($_GET['id'])){ $result = $t->FetchOne($_GET['id']); ?>

<div>
	<h1><?php echo $result[0]->title; ?></h1>
	<p><?php echo $result[0]->message; ?></p>
</div>	

<?php die();} ?>
<?php foreach ($results as $k => $v): ?>
<br>
<a href="view.php?id=<?php echo $results[$k]->id ?>"><?php echo $results[$k]->title ?></a>
<?php endforeach; ?>




