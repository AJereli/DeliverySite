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
	<div style="    background: #f0f0f0;">
		<div class="w3l_banner_nav_right">
			<div id="article">

<!-- events -->
		<div class="events">
			<h3>Акции</h3>
			<div class="w3agile_event_grids">
				<div class="col-md-6 w3agile_event_grid">
					<div class="col-md-3 w3agile_event_grid_left">
						<i class="fa fa-bullhorn" aria-hidden="true"></i>
					</div>
					<div class="col-md-9 w3agile_event_grid_right">
						<h4>невероятно важная инфа</h4>
						<p>пропустить которую просто грех</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			
			<div class="events-bottom">
				<div class="col-md-6 events_bottom_left">
					<div class="col-md-4 events_bottom_left1">
						<div class="events_bottom_left1_grid">
							<h4>20</h4>
							<p>июля, 2018</p>
						</div>
					</div>
					<div class="col-md-8 events_bottom_left2">	
						<img src="images/15.jpg" alt=" " class="img-responsive" />
						<h4>будем печь печь</h4>
						<ul>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i>3:00 PM</li>
							<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Admin</a></li>
						</ul>
						<p></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 events_bottom_left">
					<div class="col-md-4 events_bottom_left1">
						<div class="events_bottom_left1_grid">
							<h4>21</h4>
							<p>июля, 2018</p>
						</div>
					</div>
					<div class="col-md-8 events_bottom_left2">	
						<img src="images/19.jpg" alt=" " class="img-responsive" />
						<h4>печи устанут</h4>
						<ul>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i>3:30 PM</li>
							<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Admin</a></li>
						</ul>
						<p></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //events -->
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