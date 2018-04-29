<?php

$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Имя надо бы ввести";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["price"])) {
    $errorMSG .= "Надо ввести цену";
} else {
    $price = $_POST["price"];
}

if (empty($_POST["description"])) {
    $errorMSG .= "Надо ввести описание";
} else {
    $description = $_POST["description"];
}

if ($errorMSG === ""){

include("config.php");

	try {
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$stmt = $conn->prepare('INSERT INTO products (name, description, price) VALUES (?, ?, ?)');
	
	$stmt->bind_param("sss", $name, $description, $price);

	$stmt->execute();
		

	echo "Позиция теперь на своем месте!";
	$stmt->close();
	$conn->close();
	}
	catch(PDOException $e)
    {
		echo "Error: " . $e->getMessage();
    }
	$conn = null;
}



?>