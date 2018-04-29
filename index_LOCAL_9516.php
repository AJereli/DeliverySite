
<?php 
	$array = array();
?>
<!DOCTYPE html>
<html>
<head>

	<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="https://vk.com/js/api/share.js?95" charset="windows-1251"></script>

<!-- Put this script tag to the place, where the Share button will be -->

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
<?php
sideMenu();
?>

<!-- banner -->

<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Лучшие предложения</h3>
			<div class="agile_top_brands_grids">
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

			while($row = mysql_fetch_array($result))
			{
				printProducts($row['id'], $row['name'], $row['description'], $row['price'],$row['img_path']);
				
			}
			
			function printProducts($id, $name, $description, $price,$image) {
				echo '
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<div class="description">
												<h2>Пример</h2>
												Пример блока, при наведении на который появляется другой блок.
											</div>
											<a href="single.php"><img title=" " alt=" " src="images/'.$image.'.png" /></a>		
											<p>'.$name.'</p>
											<div style="height:4em;overflow: hidden;margin-bottom:0.5em;">
												<p style="margin:0 0 0;">'.$description.'</p>
											</div>
											<h4>'.$price.' р.</h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="checkout.php" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="'.$name.'" />
													<input type="hidden" name="amount" value="'.$price.'" />
													<input type="hidden" name="id" value="'.$id.'" />
													<input type="hidden" name="currency_code" value="" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="В корзину" class="button" />
												</fieldset>
													
											</form>
									
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				';
			}
			
			
			?>
						
				<div class="clearfix"> </div>
			</div>
		</div>
		<div style="margin-left: 19%; margin: 2em;">
		<h3>Так же у нас есть услуга Заказ к времени!</h3>
		<h4>В момент утверждения заказа вы можете указать что вам нужно доставить заказ к конкретному времени и ваша любимая еда окажется в нужное время в нужном месте. главное не забыть про заказ, а то выйдет довольно интересный сюрприз)</h4>
	</div>
	
<!-- //top-brands -->
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

		});

	</script>
</body>
</html>
			