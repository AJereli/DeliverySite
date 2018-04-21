<?
$id = $_POST["id"];
$status = $_POST["status"];

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