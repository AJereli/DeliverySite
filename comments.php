<?php
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['Message'];
$time=date("d.m.y G:i:s");


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

		

	if(!$email){
	}
	else{


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "site";
	$conn2 = new mysqli($servername, $username, $password, $dbname);

	$stmt = $conn2->prepare ("INSERT INTO comments (name, comm, timee, email)VALUES(?,?,?,?)");
	$stmt->bind_param('ssss',$name, $email, $comment, $time);
	$stmt->execute();
	if(!$result)
			{
				throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Рыжий Патрик | Доставка еды</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	
<?php
include("template/temp.php");
headerr();
?>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	
<!-- //header -->

<!-- banner -->
	<?php
	sideMenu();
	?>
		<div class="w3l_banner_nav_right">
<!-- mail -->
<div class="mail">
<?php
  

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
$result = mysql_query('SELECT * FROM `comments`', $conn); 
if(!$result)
{
	throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
}
while($row = mysql_fetch_array($result))
{
	printcomm($row['id'], $row['name'], $row['comm'], $row['timee']);
}

	

	function printcomm($id,$name,$comm,$time){
	echo '
	<div style="border-bottom:2px solid red";>
	<h2>'.$name.'</h2>
	<h4>'.$comm.'</h4>
	<h4>'.$time.'</h4>
	</div>
';}
?>
			<div class="agileinfo_mail_grids">
				<div class="col-md-8 agileinfo_mail_grid_right">
					<form action="comments.php" method="post">
						<div class="col-md-6 wthree_contact_left_grid">
							
							<input type="text" name="name" value="" required="" placeholder="Имя">
							<label class="control-label">Email:</label>
							<input type="email" name="email" value="" required="" placeholder="Почта">
						</div>
						<div class="clearfix"> </div>

						<textarea  name="Message"  required="" placeholder="Комментарий"></textarea>
						<input type="submit" value="Submit">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //mail -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- footer -->
	<?php
	footerr();
	?>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>s
</body>
</html>