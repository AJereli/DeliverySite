
<!DOCTYPE html>
<html>
<?php
include("template/temp.php");
head();
?>
	
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
<div style="    background: #f0f0f0;">
		<div class="w3l_banner_nav_right" style="">
<!-- about -->
		<div class="privacy about">
			<h3>Рыжий Патрик Кафе-бар</h3>
			<p class="animi">
			</p>
			<div class="agile_about_grids">
				
					<ol>
						<li>Стиль - уютный хаос</li>
						<li>Акцент - разливное пиво Ирландии, Шотландии, Бельгии, Германии, России</li>
						<li>Кухня - вкусное мясо, и не только, более 20 видов закусок к пиву</li>
						<li>Дружеская атмосфера</li>
						<li>Место, где случайные гости становятся завсегдатаями ;)</li>
					</ol>
				
				<div class="clearfix"> </div>
			</div>
			<h4>Номер телефона Кафе бара:</h4><p>
+7 (918) 906-71-25</p><h4>
Рабочее время:</h4><p>
Будние: с 11.00 до 23.00 </p><p>
Выходные с 11.00 до 00.00</p><h4> 
Адрес:</h4><p>
Ул. Ломоносова 3, ост. "Спартак" г.Ялта, Республика Крым, Россия</p>
		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner -->
<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2846.1690417421282!2d34.151171315938555!3d44.49120297910139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDTCsDI5JzI4LjMiTiAzNMKwMDknMTIuMSJF!5e0!3m2!1sru!2s!4v1524929511123" style="border:0"></iframe>
	</div>
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

	</script>
</body>
</html>