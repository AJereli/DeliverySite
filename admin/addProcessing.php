<?php

function can_upload($file){
    if($file['name'] == '')
		return 'Вы не выбрали файл.';
	

	if($file['size'] == 0)
		return 'Файл слишком большой.';
	
	$getMime = explode('.', $file['name']);
	$mime = strtolower(end($getMime));

	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	
	return true;
  }
  
  function make_upload($file){	
	$image_name = mt_rand(0, 10000) . $file['name'];
	copy($file['tmp_name'], 'img/' . $image_name);
  }

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

if (!isset($_FILES['file'])){
	$errorMSG .= "Необходимо выбрать картинку";
}else{
	$file = $_FILES['file'];
}

if ($errorMSG === ""){

	if(isset($_FILES['file'])) {
		  // проверяем, можно ли загружать изображение
		  $check = can_upload($_FILES['file']);
		
		  if($check === true){
			// загружаем изображение на сервер
			make_upload($_FILES['file']);
			echo "<strong>Файл успешно загружен!</strong>";
		  }
		  else{
			// выводим сообщение об ошибке
			echo "<strong>$check</strong>";  
		  }
		}

	try {
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$stmt = $conn->prepare('INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)');
	
	$stmt->bind_param("sss", $name, $description, $price, $image_name);

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