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
	<div style="    background: #f0f0f0;">
		<div class="w3l_banner_nav_right">
<!-- mail -->
<div id="article">

		<div class="mail">
			<h3>Mail Us</h3>
			<div class="agileinfo_mail_grids">
				<div class="col-md-4 agileinfo_mail_grid_left">
					<ul>
						<li><i class="fa fa-home" aria-hidden="true"></i></li>
						<li>Адрес<span>Ул. Ломоносова 3, ост. "Спартак" г.Ялта</span></li>
					</ul>
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i></li>
						<li>Телефон<span>+7 (978) 861-52-44</span></li>
					</ul>
				</div>
				<div class="col-md-8 agileinfo_mail_grid_right">
					<form action="#" method="post">
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="Name" value="Name*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="">
							<input type="email" name="Email" value="Email*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email*';}" required="">
						</div>
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="Telephone" value="Telephone*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone*';}" required="">
							<input type="text" name="Subject" value="Subject*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject*';}" required="">
						</div>
						<div class="clearfix"> </div>
						<textarea  name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<input type="submit" value="Submit">
						<input type="reset" value="Clear">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //mail -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- map -->
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2846.1690417421282!2d34.151171315938555!3d44.49120297910139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDTCsDI5JzI4LjMiTiAzNMKwMDknMTIuMSJF!5e0!3m2!1sru!2s!4v1524929511123" style="border:0"></iframe>
	</div>
<!-- //map -->
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