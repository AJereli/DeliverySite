<?php
include("config.php");

function head (){
echo '
<head>
	<title>Рыжий Патрик | Доставка еды</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8"/>
	<meta name="keywords" content="Доставка еды Ялта. Доставка роллов Ялта. Доставка суши Ялта. Доставка лапши Ялта. Вок Ялта. Суши Ялта. Роллы Ялта" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
	<!-- //font-awesome icons -->

	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href="//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic" rel="stylesheet" type="text/css">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$("html,body").animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?154"></script>
	<!-- start-smoth-scrolling -->
	</head>
';
}


function headerr($resus){
echo '

	<div class="agileits_header">
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars" aria-hidden="true"></i><span class="caret"></span></a>
					<div style="">
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">

						';
						while($row = mysqli_fetch_array($resus))
			{
				echo'<li><a href="products.php?t='.$row['id'].'">'.$row['label'].'</a></li>';
				
			}
			echo 			'

							</ul>
						</div>                  
					</div>
					</div>	
				</li>
			</ul>
		</div>
		<div class="product_list_header">  
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="Ваша корзина" class="button" style="border-color:white;"/>
                </fieldset>
            </form>
		</div>

		
		<div class="clearfix"> </div>
	</div>

	<div class="logo_products" style="background:#212121;">
			<div class="w3l_banner_nav_right_banner6">
				
			</div>

		<div class="container">
			<div class="w3ls_logo_products_left1">
				<ul class="special_items" style="color:red;">
					<li><a href="index.php" style="color: white;">Меню</a><i>/</i></li>
					<li><a href="delivery.php" style="color: white;">Доставка</a><i>/</i></li>
					<li><a href="comments.php" style="color: white;">Отзывы</a><i>/</i></li>
					<li><a href="promo.php" style="color: white;">Акции</a><i>/</i></li>
					<li><a href="about.php" style="color: white;">Контакты</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li style="color:white;"><i class="fa fa-phone" aria-hidden="true"></i>+7 (918) 906-71-25</li>
					
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	';
	//<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="bestpochta@grocery.com">bestpochta@grocery.com</a></li>
	}

function sideMenu($resus){

	echo '
	<div id="aside1" style="width:19%">
	<div class="banner" style="padding-top:46px;">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   		<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">

						';
						while($row = mysqli_fetch_array($resus))
			{
				echo'<li><a href="products.php?t='.$row['id'].'">'.$row['label'].'</a></li>';
				
			}
			echo 			'
						<div style="padding-left:2em;" >
						<ul class="agileits_social_icons">
						
<a rel="nofollow" href="http://vk.com/rpatrik"><img style="width:30px;" src="images/logoVK.png"></a>
<li style="margin-right: 10px;transition: opacity .3s;">
<a rel="nofollow" style="padding-left: 1px;background: #e1306c;" href="https://www.instagram.com/rpatrik_yalta/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
						</div>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="clearfix"></div>	
	</div>
</div>';
}
function footerr(){
	echo '<div class="footer">
		<div class="container">
			<div class="clearfix"> </div>

			<div class="clearfix"> </div>
		</div>
			<div class="wthree_footer">
				<p>Веселый ирландец, большие бока!<p>
			</div>
		</div>';
}
function listt($resus)
{	
	echo '<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">';

}


/*						<li><a href="wok.php?t=1">Вок</a></li>
						<li><a href="big-mac.php">Биг маки</a></li>
						<li><a href="california.php">Калифорнии</a></li>
						<li><a href="classic.php">Классика</a></li>
						<li><a href="cream.php">Cream роллы</a></li>
						<li><a href="for-beer.php">Роллы к пиву</a></li>
						<li><a href="gunkan.php">Гунканы</a></li>
						<li><a href="vip.php">Vip</a></li>
						<li><a href="set.php">Сеты</a></li>
						<li><a href="hot.php">Горячие роллы</a></li>*/
?>

