<?php

$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Имя надо бы ввести";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["price"])) {
    $errorMSG .= "Ну как без цены то";
} else {
    $price = $_POST["price"];
}

if (empty($_POST["description"])) {
    $errorMSG .= "Без описания тож никуда";
} else {
    $description = $_POST["description"];
}

if ($errorMSG === ""){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "site";

	try {
	$conn = new mysqli($servername, $username, $password, $dbname);
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