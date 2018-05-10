<?php
	include("config.php");
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	
	$FIO = $conn->real_escape_string($_POST['ФИО']);
	$number = $conn->real_escape_string($_POST['Номер']);
	$adress = $conn->real_escape_string($_POST['Адрес']);
	$order = $conn->real_escape_string($_POST['order']);
	$total = $conn->real_escape_string($_POST['total']);
	if ($FIO == "" || $number == "" || $adress == "" || $order == "" || $total == ""){
		echo "Что-то пошло не так<br>";
		echo '<a href="http://rpatrik.ru">На главную</a>';
		exit();
	}
	$stmt = $conn->prepare ('INSERT INTO orders (products, client_name, address, summ, additional)VALUES(?,?,?,?,?)');
	$stmt->bind_param('sssds',$order, $FIO, $adress, $total, $number);
	$stmt->execute();
			
?>
<!DOCTYPE html>
<html>
<? include("template/temp.php"); head();?>
<body>
<!-- header -->
	<?php
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
			
		$resus = mysqli_query($conn,'SELECT * FROM `types`'); 
		if(!$resus)
		{
			throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
		}
headerr($resus);
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
 <!--script-for sticky-nav -->
	
<!--header -->

<!--banner -->
<?php	
		$resus = mysqli_query($conn,'SELECT * FROM `types`'); 
		if(!$resus)
		{
			throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
		}
sideMenu($resus);
?>

<!-- banner -->
<div style="    background: #f0f0f0;">
<!-- payment -->
	<div class="paymennt">
		<div class="privacy about">
			<h3>Все готово!</h3>
			<h4>Ваш заказ принят к рассмотрению, через пару минут вам перезвонят для уточнения заказа!<h4>
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
</div>
<!-- //banner -->


<!-- footer -->
<div style="    position: absolute;    left: 0;    bottom: 0;    width: 100%;    height: 80px;">
<?php
footerr();

?>
</div>
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