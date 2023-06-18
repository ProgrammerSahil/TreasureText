<?php 

$db = new mysqli("localhost", "root", "", "sahil_data");
$given_user = $_POST['username'];
$given_pass = $_POST['pass'];

$query = 'SELECT * FROM users WHERE username = ? AND password = MD5(?)';
$dbStmt = $db->prepare($query);
$dbStmt->bind_param("ss", $given_user, $given_pass);
$dbStmt->execute();
$dbStmt->bind_result($id, $us, $ps);
$dbStmt->fetch();
if(is_null($id)){
	echo"Wrong Details !";
}
else{
	echo "your ID : $id";
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>index2</title>
 </head>

 </html>