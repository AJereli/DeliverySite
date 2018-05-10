
<!DOCTYPE html>
<html>
<? 
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
	$type=mysqli_fetch_array(mysqli_query($conn,'SELECT * FROM `types` WHERE(`id` LIKE '.$_GET['t'].')'));
sideMenu($resus);
?>
<div style="    background: #f0f0f0;">
	<div class="top-brands">
		<div class="container">
		<div class="w3l_banner_nav_right">
			
			<div class="w3ls_w3l_banner_nav_right_grid">
				<h3><?php echo $type['label'];?></h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
				
				<?php 
			
			$conn = mysql_connect($db_host,$db_user,$db_pass); 
			if(!$conn)
			{
				throw new Exception('Connection with DB fail');
			}
			if(!mysql_select_db($db_name, $conn)) 
			{
				throw new Exception("Cant select DB {$db_name}!");
			}
			$result = mysql_query('SELECT * FROM `products` WHERE(`type` LIKE "'.$type['name'].'")', $conn); 
			if(!$result)
			{
				throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
			}

			while($row = mysql_fetch_array($result))
			{
				$image = "placeholder.jpg";
				if ($row['image'] != ""){
					$image = $row['image'];
				}
				printProducts($row['id'], $row['name'], $row['description'], $row['price'],$image);
				
			}
			
			function printProducts($id, $name, $description, $price, $image) {
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
											<img title=" " alt=" " width="185" height="155" src="images/'.$image.'" />
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
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
<!-- //banner -->
</div>
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