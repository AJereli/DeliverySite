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

	$result=mysqli_query($conn,'DELETE FROM `promo` WHERE id="'.$_POST['id'].'";');
	if(!$result)
		{
			throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
		}


}
?>


 </body>
 </html>


