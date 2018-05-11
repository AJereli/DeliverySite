<?
$id = $_POST["id"];
$status = $_POST["status"];

include("config.php");


	try {
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
 	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = 'UPDATE orders SET status='.$status.' WHERE id='.$id.'';

    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
	
	$stmt->close();
	$conn->close();
	header('Location: orders.php');
	}
	catch(PDOException $e)
    {
		header('Location: orders.php');
		echo "Error: " . $e->getMessage();
    }
	$conn = null;



?>