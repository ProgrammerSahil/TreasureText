<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
	<style type="text/css">
		p{
			text-align:left;
			position: relative;
			font-size: 20px;
			font-family: 'Varela Round', sans-serif;
			top: 100px;
			left:30px;
		}
		h3{
			margin:0px;
			text-decoration: none;
			float:right;
			padding:10px;
			font-family: 'Varela Round', sans-serif;
		}

		textarea{
			text-align:left;
			position: relative;
			font-size: 20px;
			font-family: 'Varela Round', sans-serif;
			top: 100px;
			left:30px;
			height:200px;
			border:none;
			width:250px;

		}
	</style>
</head>
<body>
	<h3><a href="../index.html">Home ></a></h3>
<?php 

$title = htmlspecialchars($_POST["title"]);
$pass = htmlspecialchars($_POST["pass"]);

$db = new mysqli("localhost", "root", "", "text_safe");
$query = "SELECT main_text FROM main WHERE text_user = ? AND pass = MD5(?)";

$dbstmt = $db->prepare($query);
$dbstmt->bind_param("ss",$title, $pass);
$dbstmt->execute();
$dbstmt->bind_result($text);
$dbstmt->fetch();

if(is_null($text)){
	echo "<p>Sorry, no such text found!</p>";
}
else{
	echo "<textarea readonly >$text</textarea>";
}

 ?>
</body>
</html>
