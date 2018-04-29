<?
$sdd_db_host='127.0.0.1'; 
$sdd_db_name='site'; 
$sdd_db_user='root'; 
$sdd_db_pass=''; 


function setupDBConnect(){
	$conn = mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass); 
			if(!$conn)
			{
				throw new Exception('Connection with DB fail');
			}
			if(!mysql_select_db($sdd_db_name, $conn)) 
			{
				throw new Exception("Cant select DB {$ssd_db_name}!");
			}
}

?>