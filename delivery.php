<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<? include("template/temp.php"); head();?>
	
<body>
<!-- header -->
	<?php
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
<!-- about -->
		<div class="privacy about">
			<h3>Рыжий Патрик Кафе бар</h3>

			<div class="agile_about_grids">
				
					<ol>
						<li>Доставка по Ялте бесплатна при заказе от 400 рублей</li>
						<li>Доставка по Ялте при заказе менее чем на 400 рублей - ???</li>
						<li>Доставка в пригород Ялты - ???</li>
						<li>Подробности по времени доставки тож не плохо было-бы ¯\_(ツ)_/¯</li>
						
					</ol>
				
				<div class="clearfix"> </div>
			</div>
			<h4>Номер телефона Кафе бара:</h4><p>
+7 (978) 861-52-44</p><h4>
Рабочее время:</h4><p>
Будние дни: с 11.00 до 23.00 </p><p>
Выходные дни: с 11.00 до 00.00</p><h4> 
Адрес:</h4><p>
Ул. Ломоносова 3, ост. "Спартак" г.Ялта, Республика Крым, Россияю</p>
		</div>
<!-- //about -->
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

	</script>
</body>
</html>