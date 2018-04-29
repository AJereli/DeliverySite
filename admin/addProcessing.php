<?php
include("config.php");
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
  }

$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Имя надо бы ввести\n";
} else {
    $name = $_POST["name"];
}


if (empty($_POST["price"])) {
    $errorMSG .= "Надо ввести цену\n";
} else {
    $price = $_POST["price"];
}

if (empty($_POST["description"])) {
    $errorMSG .= "Надо ввести описание\n";
} else {
    $description = $_POST["description"];
}

if (!isset($_FILES['file'])){
	$errorMSG .= "Необходимо выбрать картинку\n";
}else{
	$file = $_FILES['file'];
}
$type = $_POST["type"];
if ($errorMSG === ""){

	if(isset($_FILES['file'])) {
		 
		  $check = can_upload($_FILES['file']);
		
		  if($check === true){
			make_upload($_FILES['file']);
			echo "<strong>Файл успешно загружен!</strong>\n";
		  }
		  else{

			echo "<strong>".$check."</strong>";  
			
		  }
		}
		else {exit();}
	
	try {
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$stmt = $conn->prepare('INSERT INTO products (name, description, price, image, type) VALUES (?, ?, ?, ?, ?)');
	printf("Errormessage: %s\n", $conn->error);
	echo "$image_name: " . $image_name;
	$stmt->bind_param("sssss", $name, $description, $price, $image_name, $type);
	    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;

printf("Errormessage: %s\n", $conn->error);
	$stmt->execute();
		printf("Errormessage: %s\n", $conn->error);
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

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


?>
<br>
 <a href="index.php" ><i class="fa fa-desktop "></i>На главную</a>
