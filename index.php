<?php
//Note. that we use mysqli only to show how to work with SQLI. In your real projects we strongly recommend you to use PDO. 
// enter your DB-data
$localhost = '';
$user = '';
$password = '';
$db = '';

$mysqli = mysqli_connect("localhost", "root", "", "simpleapp");

if($_GET['id']) {
	$id = $_GET['id'];// add (int) to filter input data and protect yourself from SQL-injections
	$news = mysqli_query($mysqli, "SELECT * FROM `news` WHERE `id`=$id");
} 
else {
	$news = mysqli_query($mysqli, "SELECT * FROM `news`");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>News</h2>
         <table class="table">
    <thead>
      <tr>
      	<th>ID</th>
        <th>Text</th>
       
      </tr>
    </thead>
    <tbody>
    <?php 
 	 while ($n = mysqli_fetch_assoc($news)) { ?>
    	<tr>
        <td><?= $n["id"]; ?></td>
        <td><?= $n["text"]; ?></td>
    </tr>
    <?php 
    } ?>
    </tbody>
  </table>
 
</div>
</body>
</html>
