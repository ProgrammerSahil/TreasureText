<!DOCTYPE html>
<html>
<head>
	<title>Treasure Text</title>
</head>
<body>
	<h3><a href="../index.html">Home ></a></h3>
<?php 

	$title = htmlspecialchars($_POST["title"]);
	$pass = htmlspecialchars($_POST["password"]);
	$text = htmlspecialchars($_POST["main_text"]);

	$db = new mysqli("localhost", "root", "", "text_safe");

	$query = "SELECT main_text FROM main WHERE text_user = ? AND pass = MD5(?)";
	$query1 = "INSERT INTO main VALUES (?, MD5(?), ?)";

	$dbstmt = $db->prepare($query);
	$dbstmt->bind_param("ss",$title, $pass);
	$dbstmt->execute();
	$dbstmt->bind_result($result);
	$dbstmt->fetch();

	if(is_null($result)){
		$dbstmt = $db->prepare($query1);
		$dbstmt->bind_param("sss",$title, $pass, $text);
		$dbstmt->execute();

		echo "Successfully Saved your text!";
	}
	else{
		echo "<p>Sorry the text with same title and password combination already exists !</p>";
	}

 ?>
</body>
</html>