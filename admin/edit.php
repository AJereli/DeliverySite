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
                     <h2>Список продуктов</h2>   
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
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th>Стоимость</th>
										<th>Изображение</th>
										<th>Тип</th>
										<th>Вес</th>
										<th>Лучший</th>
										<th>Изменить</th>
										<th>Удалить</th>
                                    </tr>
                                </thead>
                                <tbody>
		<?php 



			$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
			mysqli_query($conn, "SET NAMES 'utf8'"); 
						
			$sql = "SELECT * FROM products;";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					printProducts($row['id'], $row['name'], $row['description'], $row['price'], $row['img_path'], $row['isHot'], $row['type'], $row['weight']);
				}
			}

			
			
			function printProducts($id, $name, $description, $price, $img_path, $isHot, $type, $weight) {
				if ($isHot == 0){
					echo '<tr class="info">';
				}else if ($isHot == 1){
					echo '<tr class="success">';
				}
					echo '<td>'.$id.'</td>';
					echo '<td>'.$name.'</td>';
					echo '<td>'.$description.'</td>';
					echo '<td>'.$price.'</td>';
					echo '<td>'.$img_path.'</td>';
					echo '<td>'.$type.'</td>';
					echo '<td>'.$weight.'</td>';
									

				if ($isHot == 0){
					echo '<td>
					<form action="edit_control.php" method="post" id="success_form">';
						echo '<input type="hidden" name="id" value="'.$id.'"/>';
						echo '<input type="hidden" name="addHot" value="1"/>';
					echo 
					'<button type="submit" class="btn btn-primary" value="Submit">Добавить</button>
					</form></td>';
				}else if ($isHot == 1){
					echo '<td>
					<form action="edit_control.php" method="post" id="success_form">';
						echo '<input type="hidden" name="id" value="'.$id.'"/>';
						echo '<input type="hidden" name="delHot" value="1"/>';
					echo 
					'<button type="submit" class="btn btn-primary" value="Submit">Убрать</button>
					</form></td>';
				}


					echo '<td>
					<form action="edit_view.php" method="post" id="success_form">';
						echo '<input type="hidden" name="id" value="'.$id.'"/>';
						echo '<input type="hidden" name="type" value="'.$type.'"/>';
					echo 
					'<button type="submit" class="btn btn-success" value="Submit">Изменить</button>
					</form></td>';
					echo '<td>
					<form action="edit_control.php" method="post" id="success_form">';
						echo '<input type="hidden" name="id" value="'.$id.'"/>';
						echo '<input type="hidden" name="delete" value="1"/>';
					echo 
					'<button type="submit" class="btn btn-danger" value="Submit">Удалить</button>
					</form></td>';

					
				
				
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
