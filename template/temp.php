<?php

function headerr(){
echo '
	<div class="agileits_header">
		<div class="product_list_header">  
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="Ваша корзина" class="button" />
                </fieldset>
            </form>
		</div>

		
		<div class="clearfix"> </div>
	</div>
	<div class="logo_products">
			<div class="w3l_banner_nav_right_banner6"></div>

		<div class="container">
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="index.php">Меню</a><i>/</i></li>
					<li><a href="delivery.php">Доставка</a><i>/</i></li>
					<li><a href="comments.php">Отзывы</a><i>/</i></li>
					<li><a href="promo.php">Акции</a><i>/</i></li>
					<li><a href="about.php">Контакты</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>+7 (978) 861-52-44</li>
					
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>';
	//<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="bestpochta@grocery.com">bestpochta@grocery.com</a></li>
	}

function sideMenu(){
	echo '
	<div class="banner">
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
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="roll.php">Роллы</a></li>
						<li><a href="wok.php">Вок</a></li>
						<div style="padding-left:2em;" >
						<ul class="agileits_social_icons">
						

<a href="http://vk.com/rpatrik"><img style="width:30px;" src="images/logoVK.png"></a>
<li style="margin-right: 10px;transition: opacity .3s;">
<a style="padding-left: 1px;background: #e1306c;" href="https://www.instagram.com/rpatrik_yalta/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
						</div>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="clearfix"></div>	
	</div>';
}
function footerr(){
	echo '<div class="footer">
		<div class="container">
			<div class="clearfix"> </div>
<!--			<div class="agile_footer_grids">
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h5>connect with us</h5>
						<ul class="agileits_social_icons">
							<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>-->
			<div class="clearfix"> </div>
		</div>
			<div class="wthree_footer">
				<p>Веселый ирландец, большие бока!<p>
			</div>
		</div>';
}
?>