<?php
/**
 * The header for our theme

 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">


	<!-- Bootstrap -->
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap-theme.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animate.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/media-queries.css" rel="stylesheet">

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/npm.js"></script>
 <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.js"></script> 
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>





<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="background_section">
	  <div class="container">
	   <div class="">
		  <div class="inner_sect">
	  
		  
		  <div class="top_sect_bg">
				  <div class="col-md-6 col-sm-6">
				  <div class="logo">
				  <a href="<?php echo get_site_url(); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png"></a>
				  </div>
				  </div>
				  <div class="col-md-6 col-sm-6">
				  <div class="top_right_sect">
				   <div class="top_box1">
					<div class="accnt_sect">		
		
							 <?php if ( is_user_logged_in() ) { ?>
					<i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
				 <?php } 
				 else { ?>
					<i class="fa fa-user" aria-hidden="true"></i><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
				<?php } ?>
					
					<!-- <a href="http://localhost/maharishiherbal/my-account/"><i class="fa fa-user" aria-hidden="true"></i><span>My Account</span></a> -->
				 
				  </div>
					<div class="accnt_sect">
					  <!--<a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Cart:</span><span>0 item</span></a>-->
					  
					  <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
					$count = WC()->cart->cart_contents_count;
					?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Cart:</span><?php 
					if ( $count > 0 ) {
						?>
						<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
						<?php
					}
						?></a>
				 
				<?php } ?>					  
					 
					  
					</div>
					 <div class="phne_sect">
					
                    <h2>Call us: 416-803-6072</h2>
                    <h4>prakritikherbalproducts@gmail.com</h4>
					</div>
				   </div>
				  
				  </div>
				  </div>
				
				</div>
		  
	  
		  <div class="menu_sect_bg">
				 <div class="">
				  <div class="menu_section">
				  <nav role="navigation" class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collection of nav links, forms, and other content for toggling -->
				<div id="navbarCollapse" class="collapse navbar-collapse">					
						<?php
							wp_nav_menu( array( 
								'theme_location' => 'header-menu', 
								'menu_class'      => 'nav navbar-nav',
								) ); 
						?>
						
				</div>
			</nav>
				  </div>
				 </div>
				</div>
	     </div>
	   </div>
	</div>
