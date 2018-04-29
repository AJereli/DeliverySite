<?
$db_host='localhost:3306'; 
$db_name='u0499678_site'; 
$db_user='u0499_patrikRoot'; 
$db_pass='magicPASSWORD_f1';

 


function setupDBConnect() {
	
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

	if ($mysqli->connect_errno) {
		throw new Exception(mysqli_connect_errno());
	}
	return $mysqli;
}

?>