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
	$result = mysql_query('SELECT * FROM `products`', $conn); 
	if(!$result)
	{
		throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
	}
	

	$FIO=mysql_real_escape_string($_POST['ФИО']);
	$number=mysql_real_escape_string($_POST['Номер']);
	$adress=mysql_real_escape_string($_POST['Адрес']);
	$order=mysql_real_escape_string($_POST['order']);
	$total=mysql_real_escape_string($_POST['total']);

	/*$result = mysql_query('INSERT INTO `orders` (products, client_name, address, summ, additional)VALUES('.$order.', '.$FIO.', '.$adress.', '.$total.', '.$number.')');
	if(!$result)
			{
				throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
			}*/

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "site";
	$conn2 = new mysqli($servername, $username, $password, $dbname);

	$stmt = $conn2->prepare ('INSERT INTO orders (products, client_name, address, summ, additional)VALUES(?,?,?,?,?)');
	$stmt->bind_param('sssds',$order, $FIO, $adress, $total, $number);

	$stmt->execute();
	if(!$result)
			{
				throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));}
			
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
<!-- banner -->

<!-- payment -->
	<div class="paymennt">
		<div class="privacy about">
			<h3>Все готово!</h3>
			<h5>Ваш заказ принят к рассмотрению, через пару минут вам перезвонят для уточнения заказа!<h5>
			<form action="index.php" method="post" class="creditly-card-form agileinfo_form">

						<section class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<button class="submit check_out">Обратно</button>
							</div>
						</section>
					</form>
	         

		</div>
		</div>
<!-- //payment -->
		<div class="clearfix"></div>

<!-- //banner -->


<!-- footer -->
<?php
footerr();

?>
<!-- //footer -->
<!-- js -->

<!-- //js -->
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
<!--<script src="js/minicart.js"></script>
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
		});

	</script>-->

</body>
</html>