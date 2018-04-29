<?
$db_host='127.0.0.1'; 
$db_name='site'; 
$db_user='root'; 
$db_pass=''; 


function setupDBConnect() {
	
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

	if ($mysqli->connect_errno) {
		throw new Exception(mysqli_connect_errno());
	}
	return $mysqli;
}

?>