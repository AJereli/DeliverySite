<?include("config.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	
</head>
<body>
<br>
 <a href="index.php" ><i class="fa fa-desktop "></i>На главную</a>
<?php


$errorMSG = "";

if (!isset($_POST["name"])) {
    $errorMSG = "Надо ввести бирку<br>";
} else {
    $name = $_POST["name"];
}

if (!isset($_POST["label"])) {
    $errorMSG .= "Имя надо бы ввести<br>";
} else {
    $label = $_POST["label"];
}




if ($errorMSG === ""){


	try {
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	// Check connection
mysqli_query($conn, "SET NAMES 'utf8'");
	
	$stmt = $conn->prepare('INSERT INTO types (label, name) VALUES (?, ?)');


	$stmt->bind_param("ss", $label, $name);
	
	
	
	$stmt->execute();
	

	
	$stmt->close();
	$conn->close();

	}
	catch(PDOException $e)
    {
		echo "Error: " . $e->getMessage();
    }
	$conn = null;
}else{
	echo $errorMSG;
}


?>


 </body>
 </html>