﻿</<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	
</head>
<body>
<br>
 <a href="index.php" ><i class="fa fa-desktop "></i>На главную</a>

include("config.php");
// function can_upload($file){
//     if($file['name'] == '')
// 		return 'Вы не выбрали файл.\n';

// $errorCode = $file['error'];

// 	if($file['size'] == 0)
// 		return 'Файл слишком большой.\n';
	
// 	$getMime = explode('.', $file['name']);
// 	$mime = strtolower(end($getMime));

// 	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
// 	if(!in_array($mime, $types))
// 		return 'Недопустимый тип файла.\n';
	
// 	return true;
//   }
  
//   function make_upload($file){	
// 	$image_name = mt_rand(0, 10000) . $file['name'];
// 	move_uploaded_file($file['tmp_name'], '../images/' . $image_name);
// 	return $image_name;
//   }

$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Имя надо бы ввести<br>";
} else {
    $name = $_POST["name"];
}


if (empty($_POST["price"])) {
    $errorMSG .= "Надо ввести цену<br>";
} else {
    $price = $_POST["price"];
}

if (empty($_POST["description"])) {
    $errorMSG .= "Надо ввести описание<br>";
} else {
    $description = $_POST["description"];
}


// $file = $_FILES['file'];


if ($errorMSG === ""){
    // $image_name = "";
	// if(isset($_FILES['file'])) {
		 
	// 	  $check = can_upload($_FILES['file']);
		
	// 	  if($check === true){
	// 		$image_name = make_upload($_FILES['file']);
			
	// 	  }
		  
	// 	}
	// 	else {$image_name = "";}
	
	try {
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	// Check connection
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$stmt = $conn->prepare('INSERT INTO products (name, description, price, image, type) VALUES (?, ?, ?, ?, ?)');

	$stmt->bind_param("sssss", $name, $description, $price, $image_name, $type);

	$stmt->execute();
		printf("Errormessage: %s\n", $conn->error);

	echo "Позиция теперь на своем месте!";
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





 </body>
 </html>