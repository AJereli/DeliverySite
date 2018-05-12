<?php 
	$array = array();
?>
<!DOCTYPE html>
<html>

<? include("template/temp.php"); head();?>

	
<body>
<!-- header -->
	<?php
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
			mysqli_query($conn, "SET NAMES 'utf8'"); 
//mysqli_query($conn,"SET CHARACTER SET 'utf8'");
//mysqli_query($conn"SET SESSION collation_connection = 'utf8_general_ci'");
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
<!-- top-brands -->
	<div class="top-brands">
		<div id="article">
		<div class="container">
			<h3>Лучшие предложения</h3>
			<div class="agile_top_brands_grids">
			<?php 
			
			
			$result = $conn->query('SELECT * FROM `products`'); 
			if(!$result)
			{
				throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
			}

			while($row = $result->fetch_assoc())
			{
				$image = "placeholder.jpg";
				if ($row['img_path'] != ""){
					$image = $row['img_path'];
				}
				printProducts($row['id'], $row['name'], $row['description'], $row['price'], $image);
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
											<img title=" " width="185" height="155"  alt=" " src="images/'.$image.'" />	
											<div style="height:4em;overflow: hidden;margin-bottom:0.5em;">
												<p>'.$name.'</p>
												</div>
											<div style="height:60px;overflow: hidden;margin-bottom:0.5em;">
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
													<input type="hidden" name="image" value="'.$image.'" />
													<input type="hidden" name="item_name" value="'.$name.'" />
													<input type="hidden" name="amount" value="'.$price.'" />
													<input type="hidden" name="id" value="'.$id.'" />
													
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
		<h3>Так же у нас есть услуга заказ ко времени</h3>
		<center><h4>Вы можете заказать любимую еду заранее в удобное для вас время</h4></center>
		</div>
	</div>
	</div>
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



	<style>
.sticky {
  position: fixed;
  z-index: 101;
}
.stop {
  position: relative;
  z-index: 101;
}
</style>

<script>
(function(){
var a = document.querySelector('#aside1'), b = null, P = 0;
window.addEventListener('scroll', Ascroll, false);
document.body.addEventListener('scroll', Ascroll, false);
function Ascroll() {
  if (b == null) {
    var Sa = getComputedStyle(a, ''), s = '';
    for (var i = 0; i < Sa.length; i++) {
      if (Sa[i].indexOf('overflow') == 0 || Sa[i].indexOf('padding') == 0 || Sa[i].indexOf('border') == 0 || Sa[i].indexOf('outline') == 0 || Sa[i].indexOf('box-shadow') == 0 || Sa[i].indexOf('background') == 0) {
        s += Sa[i] + ': ' +Sa.getPropertyValue(Sa[i]) + '; '
      }
    }
    b = document.createElement('div');
    b.style.cssText = s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
    a.insertBefore(b, a.firstChild);
    var l = a.childNodes.length;
    for (var i = 1; i < l; i++) {
      b.appendChild(a.childNodes[1]);
    }
    a.style.height = '0';
    a.style.padding = '0';
    a.style.border = '0';
  }
  var Ra = a.getBoundingClientRect(),
      R = Math.round(Ra.top + b.getBoundingClientRect().height - document.querySelector('#article').getBoundingClientRect().bottom);  // селектор блока, при достижении нижнего края которого нужно открепить прилипающий элемент
  if ((Ra.top - P) <= 0) {
    if ((Ra.top - P) <= R) {
      b.className = 'stop';
      b.style.top = - R +'px';
    } else {
      b.className = 'sticky';
      b.style.top = P + 'px';
    }
  } else {
    b.className = '';
    b.style.top = '';
  }
  window.addEventListener('resize', function() {
    a.children[0].style.width = getComputedStyle(a, '').width
  }, false);
}
})()
</script>
</body>
</html>