<? include("template/temp.php");?>
<!DOCTYPE html>
<html>
<?
echo "<pre>"; 
print_r($_POST); 
echo "</pre><hr>";
 head();?>
	
<body>
<!-- header -->
	<?php
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
 mysqli_query($conn, "SET NAMES 'utf8'");
			
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
		<div class="w3l_banner_nav_right">
<!-- about -->
<div id="article">

		<div class="privacy about">
			<h3>Корзина</h3>
			
	      <div class="checkout-right">
	      	<table class="timetable_sub">
					<thead>
						<tr>
							<th>№</th>	
							<th>Изображение</th>
							<th>Количество</th>
							<th>Название</th>
						
							<th>Цена</th>

						</tr>
					</thead>
					<tbody>
	      	<?php  
	      	
			$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


			if ($conn->connect_errno) {
				throw new Exception(mysqli_connect_errno());
			}
			$result = $conn->query('SELECT * FROM `products`'); 


			$all=0;
			while($row = $result->fetch_assoc())
			{
				for (reset($_POST); ($key = key($_POST)); next($_POST))
					{

						if($row['name']==$_POST[$key])
						{
							$quantit=prev($_POST);
							$all+=$quantit;
							next($_POST);
						}	
				}
			}
			echo '<h4>В вашем списке покупок: <span>'.$all.'</span></h4>';?>
			<?php
			

			function getItemJsonStr ($name, $quantit, $price){
				return '{"item": {"name": "'.$name.'","quantit":'.$quantit.',"amount":'.$price.'}}';
			}
			
			$result = $conn->query('SELECT * FROM `products`'); 
			

			$order;
			$in=0;
			$total=0;
			
			
			$items = array();
			
			
			
			while($row = $result->fetch_assoc())
			{
				for (reset($_POST); ($key = key($_POST)); next($_POST))
				{
					if($row['name']==$_POST[$key])
					{	
						$image = "placeholder.jpg";
						if ($row['img_path'] != ""){
							$image = $row['img_path'];
						}
							
						$in+=1;
						$quantit=prev($_POST);
						next($_POST);
						$all+=$quantit;
						array_push($items, getItemJsonStr($row['name'], $quantit,$row["price"] ));
						printProducts($row["id"], $row["name"], $row["description"], $row["price"], $image, $quantit,$in);
						$order=$order.$row["name"]." ".$quantit."шт., ";
						$total+=$row["price"]*$quantit;

					}	
				}
			}
			
			$json = '{"items": [' . join(',', $items) . "]}";
			
			//echo $json;
			
			function printProducts($id, $name, $description, $price, $image, $quantit, $in) 
			{
				echo'
					<tr class="rem'.$in.'">
					 	<td class="invert">'.$in.'</td>
						<td class="invert-image"><img src="images/'.$image.'" alt=" " class="img-responsive"></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<!--<div class="entry value-minus">&nbsp;</div>-->
									<div class="entry value">'.$quantit.'</div>
									<!--<div class="entry value-plus active">&nbsp;</div>-->
								</div>
							</div>
						</td>
						<td class="invert">'.$name.'</td>
						
						<td class="invert">'.$price.'</td>
						<!-- <td class="invert">
							<div class="rem">
								<div class="close'.$in.'"> </div>
							</div>
						</td> -->
					</tr>
			';}
			echo '
				<tr>
    				<td colspan="4" style="text-align:right">ИТОГО:</td>
    				<td>'.$total.'</td><!-- Задаем количество ячеек по горизонтали для объединения-->
				</tr>';
			settype($total, 'string');
			$_POST['t']=$total;
			$_POST['o']=$order;

			?>
			</tbody></table>
			</div>


			<div class="checkout-left">	
				
				<div class="col-md-8 address_form_agile">
					<h4>Укажите ваши данные</h4>
					<form action="payment.php" method="post" class="creditly-card-form agileinfo_form">

						<section class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row form-group">
									<div class="controls">
										<label class="control-label">ФИО: </label>
										<input class="billing-address-name form-control" type="text" name="ФИО" placeholder="Иванов Иван Иванович">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<label class="control-label">Номер телефона:</label>
												<input class="form-control" type="text" name="Номер" placeholder="+79780000000">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right">
											<div class="controls">
												<label class="control-label">Адрес: </label>
												<input class="form-control" type="text" name="Адрес" placeholder="г. Симферополь, ул. Кирова 15">
											</div>
										</div>
										<div class="clear"> </div>
									</div>
								</div>
								<?php
									$val=$_POST['o'];
									$total=$_POST['t'];
									
									echo '<input type="hidden" name="order" value="'.$val.'" />';
									echo '<input type="hidden" name="total" value="'.$total.'" />';
									echo '<input type="hidden" name="json" value="'.$json.'" />';
								?>
								<button class="submit check_out">Подтвердить</button>
							</div>
						</section>
					</form>
				</div>
				<div class="clearfix"> </div>
				
			</div>
		</div>
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
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
							 <!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
							<script>$(document).ready(function(c) {
								$('.close2').on('click', function(c){
									$('.rem2').fadeOut('slow', function(c){
										$('.rem2').remove();
									});
									});	  
								});
						   </script>
						  	<script>$(document).ready(function(c) {
								$('.close3').on('click', function(c){
									$('.rem3').fadeOut('slow', function(c){
										$('.rem3').remove();
									});
									});	  
								});
						   </script>
						   	<script>$(document).ready(function(c) {
								$('.close4').on('click', function(c){
									$('.rem4').fadeOut('slow', function(c){
										$('.rem4').remove();
									});
									});	  
								});
						   </script>
						   <script>$(document).ready(function(c) {
								$('.close5').on('click', function(c){
									$('.rem5').fadeOut('slow', function(c){
										$('.rem5').remove();
									});
									});	  
								});
						   </script>
						   <script>$(document).ready(function(c) {
								$('.close6').on('click', function(c){
									$('.rem6').fadeOut('slow', function(c){
										$('.rem6').remove();
									});
									});	  
								});
						   </script>
						   <script>$(document).ready(function(c) {
								$('.close7').on('click', function(c){
									$('.rem7').fadeOut('slow', function(c){
										$('.rem7').remove();
									});
									});	  
								});
						   </script>
						   <script>$(document).ready(function(c) {
								$('.close8').on('click', function(c){
									$('.rem8').fadeOut('slow', function(c){
										$('.rem8').remove();
									});
									});	  
								});
						   </script>
						   <script>$(document).ready(function(c) {
								$('.close9').on('click', function(c){
									$('.rem9').fadeOut('slow', function(c){
										$('.rem9').remove();
									});
									});	  
								});
						   </script>
						   <script>$(document).ready(function(c) {
								$('.close10').on('click', function(c){
									$('.rem10').fadeOut('slow', function(c){
										$('.rem10').remove();
									});
									});	  
								});
						   </script>
						   <script>$(document).ready(function(c) {
								$('.close11').on('click', function(c){
									$('.rem11').fadeOut('slow', function(c){
										$('.rem11').remove();
									});
									});	  
								});
						   </script>



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
    	b.style.width = '100%';
      b.className = 'stop';
      b.style.top = - R +'px';
    } else {
    	b.style.width = '19%';
      b.className = 'sticky';
      b.style.top = P + 'px';
    }
  } else {
  	b.style.width = '100%';
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