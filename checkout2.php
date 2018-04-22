<?php  
$i=0;

for (reset($_POST); ($key = key($_POST)); next($_POST))
{
		$leng =strlen($key);
	$leng-=2;
	echo $key. '=&gt;' .$_POST[$key] . '<br>';
	
	$asdf= substr($key, 0,$leng);
	if($asdf=='quantity')
	{
		$i+=$_POST[$key];
	}	
}
$sdd_db_host='127.0.0.1'; 
			$sdd_db_name='site'; 
			$sdd_db_user='root'; 
			$sdd_db_pass=''; 
			$conn = mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass); 
			if(!$conn)
			{
				throw new Exception('Connection with DB fail');
			}
			if(!mysql_select_db($sdd_db_name, $conn)) 
			{
				throw new Exception("Cant select DB {$ssd_db_name}!");
			}
			$result = mysql_query('SELECT * FROM `products`', $conn); 
			if(!$result)
			{
				throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
			}

			while($row = mysql_fetch_array($result))
			{
				for (reset($_POST); ($key = key($_POST)); next($_POST))
					{

						if($row['name']==$_POST[$key])
						{
							printProducts($row['id'], $row['name'], $row['description'], $row['price'],$quantit);
						$quantit=prev($_POST);
						echo current($_POST);
						next($_POST);
						
						}	
				}
			}

			function printProducts($id, $name, $description, $price, $quantit) 
			{
				echo $id.' '.$name.' '.$description.' '.$price.' '.$quantit;
			}
?>