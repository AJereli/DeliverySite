<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
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
                  <a href="#" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

 <li >
                        <a href="index.php" ><i class="fa fa-desktop "></i>Главная </a>
                    </li>
                   

                    <li>
                        <a href="ui.php"><i class="fa fa-table "></i>UI Elements  </a>
                    </li>
                    <li class="active-link">
                        <a href="orders.php"><i class="fa fa-edit "></i>Текущие заказы</a>
                    </li>



               
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Последние 50 заказов</h2>   
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
										<th>Подтвердить</th>
										<th>Отказать</th>
                                    </tr>
                                </thead>
                                <tbody>
		<?php 
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "site";

			$conn = new mysqli($servername, $username, $password, $dbname);
			
			
			$sql = "SELECT * FROM orders ORDER BY id DESC LIMIT 20";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					printProducts($row['id'], $row['products'], $row['client_name'], $row['address'], $row['summ'], $row['additional'], $row['status']);
				}
			}

			
			
			function printProducts($id, $products, $client_name, $address, $summ, $additional, $status) {
				if ($status == 0){
					echo '<tr class="info">';
				}else if ($status == 1){
					echo '<tr class="success">';
				}else {
					echo '<tr class="danger">';
				}
				
					echo '<td>'.$id.'</td>';
					echo '<td>'.$products.'</td>';
					echo '<td>'.$client_name.'</td>';
					echo '<td>'.$address.'</td>';
					echo '<td>'.$summ.'</td>';
					echo '<td>'.$additional.'</td>';
					
					echo '<td>
					<form action="confirm.php" method="post" id="success_form">';
						echo '<input type="hidden" name="id" value="'.$id.'"/>';
						echo '<input type="hidden" name="status" value="1"/>';
					echo 
					'<button type="submit" class="btn btn-success" value="Submit">Подтвердить</button>
					</form></td>';
					echo '<td>
					<form action="confirm.php" method="post" id="denied_form">';
						echo '<input type="hidden" name="id" value="'.$id.'"/>';
						echo '<input type="hidden" name="status" value="2"/>';
					echo 
					'<button type="submit" class="btn btn-danger" value="Submit">Отказать</button>
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
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;"  target="_blank">www.binarytheme.com</a>
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript" src="confirm.js"></script>
   
</body>
</html>
