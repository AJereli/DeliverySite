<?include("config.php");?>
</<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	
</head>
<body>
<br>
 <a href="index.php" ><i class="fa fa-desktop "></i>На главную</a>
<?php

function can_upload($file){
    if($file['name'] == '')
		return 'Вы не выбрали файл.\n';

$errorCode = $file['error'];

	if($file['size'] == 0)
		return 'Файл слишком большой.\n';
	
	$getMime = explode('.', $file['name']);
	$mime = strtolower(end($getMime));

	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.\n';
	
	return true;
  }
  
  function make_upload($file){	
	$image_name = mt_rand(0, 10000) . $file['name'];
	move_uploaded_file($file['tmp_name'], '../images/' . $image_name);
	return $image_name;
  }
  echo "0n:".$name . "d:". $description ."p: ". $price ."t". $type;
$errorMSG = "";

if (!isset($_POST["name"])) {
    $errorMSG = "Имя надо бы ввести<br>";
} else {
    $name = $_POST["name"];
}

echo "01n:".$name . "d:". $description ."p: ". $price ."t". $type;
if (!isset($_POST["price"])) {
    $errorMSG .= "Надо ввести цену<br>";
} else {
    $price = $_POST["price"];
}
echo "02n:".$name . "d:". $description ."p: ". $price ."t". $type;
if (!isset($_POST["description"])) {
    $errorMSG .= "Надо ввести описание<br>";
} else {
    $description = $_POST["description"];
}

$type = $_POST["type"];
// $file = $_FILES['file'];

echo "2n:".$name . "d:". $description ."p: ". $price ."t". $type;
if ($errorMSG === ""){
    // $image_name = "";
	// if(isset($_FILES['file'])) {
		 
	// 	  $check = can_upload($_FILES['file']);
		
	// 	  if($check === true){
	// 		$image_name = make_upload($_FILES['file']);
			
	// 	  }
		  
	// 	}
	// 	else {$image_name = "";}
	echo "3n:".$name . "d:". $description ."p: ". $price ."t". $type;
	//try {
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	// Check connection
	echo "31n:".$name . "d:". $description ."p: ". $price ."t". $type;
	
	
	$stmt = $conn->prepare('INSERT INTO products (name, description, price, image, type) VALUES (?, ?, ?, ?, ?)');

	echo "32n:".$name . "d:". $description ."p: ". $price ."t". $type;
	$stmt->bind_param("sssss", $name, $description, $price, $image_name, $type);
	
	echo "4n:".$name . "d:". $description ."p: ". $price ."t". $type;
	
	$stmt->execute();
		printf("Errormessage: %s\n", $conn->error);

	echo "Позиция теперь на своем месте!";
	$stmt->close();
	$conn->close();
	// }
	// catch(PDOException $e)
    // {
	// 	echo "Error: " . $e->getMessage();
    // }
	$conn = null;
}else{
	echo $errorMSG;
}


?>


 </body>
 </html>