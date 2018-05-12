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
    $errorMSG = "Имя надо бы ввести<br>";
} else {
    $name = $_POST["name"];
}

if ($errorMSG === ""){


	try {
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	mysqli_query($conn, "SET NAMES 'utf8'");
	$value=1;
	$product = mysqli_query($conn,'SELECT * FROM `products` WHERE(`name` LIKE "'.$name.'")');
	$row = mysqli_fetch_array($product);
	print_r($row);
	if ($row['isHot']==1) {
		$setHot = mysqli_query($conn,'UPDATE `products` SET isHot="0" WHERE id='.$row[id].'');
	}else
	{
		$setHot = mysqli_query($conn,'UPDATE `products` SET isHot="1" WHERE id='.$row[id].'');
	}
	

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