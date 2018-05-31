<?php  

echo "<pre>"; 
print_r($_POST); 
echo "</pre><hr>"; 
$arr = $_POST["order"];

print_r($arr);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?
include("config.php");
printHead();
?>

<body>
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />
                    </a>
                </div>
              
                 <span class="logout-spn" >
                  <a href="#" style="color:#fff;">Выйти</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <? printSideMenu() ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Заказы за сегодня</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
				  
				   <div class=".col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Id</th>
                                        <th>Состав заказа</th>
                                        <th>Имя клиента</th>
                                        <th>Адресс доставки</th>
										<th>Сумма</th>
										<th>Телефон</th>
                                    </tr>
                                </thead>
                                <tbody>
		<?php 
		$date=date("m.d.y");


			$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
			
			
			$sql = "SELECT * FROM orders ORDER BY id DESC LIMIT 20";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($date==$row['date'] and $row['status']==1){
					printProducts($row['id'], $row['products'], $row['client_name'], $row['address'], $row['summ'], $row['additional'], $row['status']);}
				}
			}

			
			
			function printProducts($id, $products, $client_name, $address, $summ, $additional, $status) {				
					echo '<td>'.$id.'</td>';
					echo '<td>'.$products.'</td>';
					echo '<td>'.$client_name.'</td>';
					echo '<td>'.$address.'</td>';
					echo '<td>'.$summ.'</td>';
					echo '<td>'.$additional.'</td>';
					

					
				
				
				echo '</tr>';
			}
			
			
			?>

                                </tbody>
                            </table>
                        </div>
                    </div>
              
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <? printFooter(); ?>
   
</body>
</html>
