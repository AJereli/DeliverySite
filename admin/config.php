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

function printHead (){
	echo '
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
   <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<head>
    <meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Панелька админа</title>
</head>
	';

}
function printFooter(){
	echo '
	 <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2018 rpatrik.ru | Кафе-бар Рыжий Патрик. Доставка японской кухни по Ялта | Design by: "Знакомые сестры"
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
    <script  type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/validator.min.js"></script>
	
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	';
}


function printSideMenu(){
	echo '
	<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Добавить позицию</a>
                    </li>
                   

                    <li>
                        <a href="orders.php"><i class="fa fa-table "></i>Текущие заказы</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-edit "></i>Страница в разработке</a>
                    </li>
              
                </ul>
                            </div>

        </nav>
	';
	
	
}

?>