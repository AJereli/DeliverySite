<?php
include("template/temp.php");

$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['Message'];
$time=date("d.m.y G:i:s");

	
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	
	$res = $conn->query('SELECT * FROM `products`');

	if($email){
		$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

	$stmt = $conn->prepare ("INSERT INTO comments (name, comm, timee, email)VALUES(?,?,?,?)");
	$stmt->bind_param('ssss',$name, $email, $comment, $time);
	$stmt->execute();
	if(!$res)
			{
				throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
				}
	}
	
?>
<!DOCTYPE html>
<html>
<?  head();?>
	
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
<!-- mail -->
<div class="mail">
<?php
  

$result = $conn->query('SELECT * FROM `comments`'); 
if(!$result)
{
	throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
}
while($row = $result->fetch_assoc())
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

	</script>
</body>
</html>