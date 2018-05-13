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
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	mysqli_query($conn, "SET NAMES 'utf8'");
$id=$_POST['id'];
$result = mysqli_query($conn,'SELECT * FROM `products` WHERE(`id` LIKE "'.$_POST['id'].'");'); 
$row = $result->fetch_assoc();

if ($_POST['delete']=="1") {

	$result=mysqli_query($conn,'DELETE FROM `products` WHERE id="'.$_POST['id'].'";');
	if(!$result)
		{
			throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
		}
	echo "Удалилось!";

}else if ($_POST['addHot']=="1") {
	$result = mysqli_query ($conn,'UPDATE products SET isHot="1" WHERE id="'.$_POST['id'].'";');
	if(!$result)
		{
			throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
		}
	echo "ЭТО ЛУЧШЕЕ ПРЕДЛОЖЕНИЕ!";
}
else if ($_POST['delHot']=="1") {
	$result = mysqli_query ($conn,'UPDATE products SET isHot="0" WHERE id="'.$_POST['id'].'";');
	if(!$result)
		{
			throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
		}
	echo "Это предложение уже не так хорошо!";
}
else
{

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
$errorMSG = "";

if (!empty($_POST["name"])) {
	$name = $_POST["name"];
	$stmt = $conn->prepare('UPDATE `products` SET name=? WHERE id='.$row['id'].'');
	$stmt->bind_param("s", $name);
	$stmt->execute();
	$stmt->close();
}
if (!empty($_POST["price"])) {
    $price = $_POST["price"];
    $stmt = $conn->prepare('UPDATE `products` SET price=? WHERE id='.$row['id'].'');

	$stmt->bind_param("s", $price);
	$stmt->execute();

	$stmt->close();
}
if (!empty($_POST["description"])) {
    $description = $_POST["description"];
    $stmt = $conn->prepare('UPDATE `products` SET description=? WHERE id='.$row['id'].'');

	$stmt->bind_param("s", $description);
	$stmt->execute();

	$stmt->close();
}    
if (!empty($_POST["weight"])) {
    $weight = $_POST["weight"];
    $stmt = $conn->prepare('UPDATE `products` SET weight=? WHERE id='.$row['id'].'');

	$stmt->bind_param("s",$weight);
		
	$stmt->execute();
	

	$stmt->close();
}

//$type = $_POST["type"];
$file = $_FILES['file'];


$image_name = "";

if ($errorMSG === ""){
	$image_name = "";
		if(isset($_FILES['file'])) 
		{
			$check = can_upload($_FILES['file']);
			if($check === true){
			$image_name = make_upload($_FILES['file']);
			$stmt = $conn->prepare('UPDATE `products` SET img_path=? WHERE id='.$row['id'].'');
			$stmt->bind_param("s", $image_name);
			$stmt->execute();
			$stmt->close();
			}
		}

}

}
?>


 </body>
 </html>


