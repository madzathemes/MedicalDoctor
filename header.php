<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 oldie no-js"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9 no-js"> <![endif]-->
<html <?php language_attributes(); ?>>
<head class="animated">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head();

 global $page, $post, $paged, $col_4, $col_8, $mt_options;

?>

</head>
<body <?php body_class(); ?> >
<?php
$title_sub=get_post_meta(get_the_ID(), "m_title_sub", true);
$title=get_post_meta(get_the_ID(), "m_title_on", true);
$header=get_post_meta(get_the_ID(), "madza_header_type", true);
$headerp=get_post_meta(get_the_ID(), "m_page_background", true);
$_bacground_image_page=get_post_meta(get_the_ID(), "m_page_background", true);
$breadcrumbs = get_post_meta(get_the_ID(), "m_title_bred", true);
$pagination_navigation = get_post_meta(get_the_ID(), "madza_portfolio_navigation", true);
$mt_options = get_option("themename_theme_options");

$mt_options = get_option("themename_theme_options");

function mt_nav_mobile() {
	wp_nav_menu( array('theme_location'=>"select_menu",  'menu_class' => 'mobile',  'echo' => true, 'depth' => 2));
}
add_filter('mt_nav_mobile','mt_nav_mobile');

if(!empty($mt_options["mt_mobile_s"])){ if($mt_options["mt_mobile_s"]=="new"){ ?>
<div class="mt-smart-menu-out hidden-lg hidden-md"></div>
<div class="mt-smart-menu">
	<span class="close pointer"></span>
	<?php mt_social(); ?>
	<?php mt_nav_mobile(); ?>
	<?php mt_header_html_r(); ?>
	<?php mt_menu_html_r(); ?>
	<?php do_action('icl_language_selector');?>
</div>
<div class="mt-header-mobile hidden-lg hidden-md top-nav">
<div class="nav-mobile pointer pull-right">
	<div class="mt-m-cool-button">
		<span class="mt-m-cool-button-line"></span>
	</div>
</div>
<div class="mt-mobile-logo"><?php mt_logo_r2(); ?></div>
</div>
<div class="mt-header-space hidden-lg hidden-md"></div>
<?php }}

if($mt_options['mt_responsive']=='responsive_no') {

	$mt_mobile = "hidden-lg hidden-md hidden-sm hidden-xs";
	$mt_destop = "";

} else {

	$mt_mobile = "hidden-lg hidden-md";
	$mt_destop = "hidden-sm hidden-xs";

}

/*-----------------------------------------------------------------------------------*/
/*	BG IMAGE
/*-----------------------------------------------------------------------------------*/

$_background_exist_r = "no";
if ( ! empty( $_bacground_image_page )) {

	if ( $_bacground_image_page['background-image'] !="") { if ( $_bacground_image_page['background-repeat'] =="" ) { $_background_exist_r = "yes"; } }
}

$mt_homepage_bg_p_image = get_option("themename_theme_options");

if ( ! empty( $_bacground_image_page )) {

	if ( $_background_exist_r == "yes" and $_bacground_image_page['background-image']!="") {

		?><img id="background" src="<?php echo $_bacground_image_page['background-image']; ?>" alt=""  /><?php

	}
}

if($_background_exist_r =="no") {

	if ( ! empty( $mt_homepage_bg_p_image )) {
				if($mt_homepage_bg_p_image['background_repeat']=="full") {
					?><img id="background" src="<?php echo $mt_homepage_bg_p_image['image_upload_test']; ?>" alt=""  /><?php

				}
	 	}

}






function mt_logo() {

	global $mt_options;

	if($mt_options['mt_logo']!="") { $logo_image = $mt_options['mt_logo']; } else { $logo_image = get_template_directory_uri()."/images/medicaldoctor_logo.gif";  }

	?>
	<a style="margin-top:<?php if($mt_options['mt_logo_t']!="") { echo $mt_options['mt_logo_t']; } else { echo "15"; } ?>px; margin-bottom:<?php if($mt_options['mt_logo_b']!="") { echo $mt_options['mt_logo_b']; } else { echo "15"; } ?>px" class="logo" href="<?php echo home_url();?>">

		<img width="<?php if($mt_options['mt_logo_w']!="") { echo $mt_options['mt_logo_w']; } else { echo "230"; } ?>" height="<?php if($mt_options['mt_logo_h']!="") { echo $mt_options['mt_logo_h']; } else { echo "50"; } ?>" src="<?php echo $logo_image; ?>"  alt="<?php bloginfo('name'); ?>" />

	</a>


	<?php
}

add_filter('mt_logo','mt_logo');


function mt_logo_r() {

	global $mt_options;

	if($mt_options['mt_logo_r']!="") { $logo_image_responsive = $mt_options['mt_logo_r']; } else { $logo_image_responsive = get_template_directory_uri()."/images/medicaldoctor_logo.gif";  }

	?>


	<a class="hidden-lg hidden-md text-center  center-block" style="margin-top:<?php if($mt_options['mt_logo_t']!="") { echo $mt_options['mt_logo_t']; } else { echo "15"; } ?>px; margin-bottom:<?php if($mt_options['mt_logo_b']!="") { echo $mt_options['mt_logo_b']; } else { echo "15"; } ?>px" href="<?php echo home_url();?>">

		<img  width="<?php if($mt_options['mt_logo_w']!="") { echo $mt_options['mt_logo_w']; } else { echo "230"; } ?>" height="<?php if($mt_options['mt_logo_h']!="") { echo $mt_options['mt_logo_h']; } else { echo "50"; } ?>" src="<?php echo $logo_image_responsive; ?>" alt="<?php bloginfo('name'); ?>" />

	</a>
	<?php
}

add_filter('mt_logo_r','mt_logo_r');

function mt_logo_r2() {

	global $mt_options;

	if($mt_options['mt_logo_r']!="") { $logo_image_responsive = $mt_options['mt_logo_r']; } else { $logo_image_responsive = get_template_directory_uri()."/images/medicaldoctor_logo.gif";  }

	?>


	<a class="hidden-lg hidden-md text-center center-block" href="<?php echo home_url();?>">

		<img  width="<?php if($mt_options['mt_logo_w']!="") { echo $mt_options['mt_logo_w']; } else { echo "230"; } ?>" height="<?php if($mt_options['mt_logo_h']!="") { echo $mt_options['mt_logo_h']; } else { echo "50"; } ?>" src="<?php echo $logo_image_responsive; ?>" alt="<?php bloginfo('name'); ?>" />

	</a>
	<?php
}

add_filter('mt_logo_r2','mt_logo_r2');



function mt_social() {

	?> <ul class="mt-social"> <?php

		$mt_options = get_option("themename_theme_options");

		if($mt_options['mt_icon_facebook']!="") {?><li><a class="mt-soc-facebook" href="<?php echo $mt_options['mt_icon_facebook']; ?>"><i class="fa fa-facebook"></i></a></li><?php }
		if($mt_options['mt_icon_twitter']!="") {?><li><a class="mt-soc-twitter" href="<?php echo $mt_options['mt_icon_twitter']; ?>"><i class="fa fa-twitter"></i></a></li><?php }
		if($mt_options['mt_icon_vimeo']!="") {?><li><a class="mt-soc-vimeo" href="<?php echo $mt_options['mt_icon_vimeo']; ?>"><i class="fa fa-vimeo-square"></i></a></li><?php }
		if($mt_options['mt_icon_youtube']!="") {?><li><a class="mt-soc-youtube" href="<?php echo $mt_options['mt_icon_youtube']; ?>"><i class="fa fa-youtube"></i></a></li><?php }
		if($mt_options['mt_icon_linkedin']!="") {?><li><a class="mt-soc-linkedin" href="<?php echo $mt_options['mt_icon_linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li><?php }
		if($mt_options['mt_icon_gplus']!="") {?><li><a class="mt-soc-google" href="<?php echo $mt_options['mt_icon_gplus']; ?>"><i class="fa fa-google-plus"></i></a></li><?php }
		if($mt_options['mt_icon_dribble']!="") {?><li><a class="mt-soc-dribbble" href="<?php echo $mt_options['mt_icon_dribble']; ?>"><i class="fa fa-dribbble"></i></a></li><?php }
		if($mt_options['mt_icon_skype']!="") {?><li><a class="mt-soc-skype" href="<?php echo $mt_options['mt_icon_skype']; ?>"><i class="fa fa-skype"></i></a></li><?php }
		if($mt_options['mt_icon_delicious']!="") {?><li><a class="mt-soc-delicious"  href="<?php echo $mt_options['mt_icon_delicious']; ?>"><i class="fa fa-delicious"></i></a></li><?php }
		if($mt_options['mt_icon_pinterest']!="") {?><li><a class="mt-soc-pinterest" href="<?php echo $mt_options['mt_icon_pinterest']; ?>"><i class="fa fa-pinterest"></i></a></li><?php }
		if($mt_options['mt_icon_yahoo']!="") {?><li><a class="mt-soc-yahoo" href="<?php echo $mt_options['mt_icon_yahoo']; ?>"><i class="fa fa-yahoo"></i></a></li><?php }
		if($mt_options['mt_icon_amazon']!="") {?><li><a class="mt-soc-amazon" href="<?php echo $mt_options['mt_icon_amazon']; ?>"><i class="fa fa-shopping-cart"></i></a></li><?php }
		if(!empty($mt_options['mt_icon_instagram'])) { if($mt_options['mt_icon_instagram']!="") {?><li><a class="mt-soc-instagram" href="<?php echo $mt_options['mt_icon_instagram']; ?>"><i class="fa fa-instagram"></i></a></li><?php } }
		if($mt_options['mt_icon_rss']!="") {?><li><a class="mt-soc-rss" href="<?php echo $mt_options['mt_icon_rss']; ?>"><i class="fa fa-rss"></i></a></li><?php }

	?> </ul> <?php
}

add_filter('mt_social','mt_social');


function mt_social_r() {
?> <ul class="mt-social tt-wrapper mt-social-responsive" style="margin: 30px 0px 10px !important; padding: 0px;"> <?php

        $mt_options = get_option("themename_theme_options");

        if($mt_options['mt_icon_facebook']!="") {?><li><a class="mt-soc-facebook" href="<?php echo $mt_options['mt_icon_facebook']; ?>"><i class="fa fa-facebook"></i></a></li><?php }
        if($mt_options['mt_icon_twitter']!="") {?><li><a class="mt-soc-twitter" href="<?php echo $mt_options['mt_icon_twitter']; ?>"><i class="fa fa-twitter"></i></a></li><?php }
        if($mt_options['mt_icon_vimeo']!="") {?><li><a class="mt-soc-vimeo" href="<?php echo $mt_options['mt_icon_vimeo']; ?>"><i class="fa fa-vimeo-square"></i></a></li><?php }
        if($mt_options['mt_icon_youtube']!="") {?><li><a class="mt-soc-youtube" href="<?php echo $mt_options['mt_icon_youtube']; ?>"><i class="fa fa-youtube"></i></a></li><?php }
        if($mt_options['mt_icon_linkedin']!="") {?><li><a class="mt-soc-linkedin" href="<?php echo $mt_options['mt_icon_linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li><?php }
        if($mt_options['mt_icon_gplus']!="") {?><li><a class="mt-soc-google" href="<?php echo $mt_options['mt_icon_gplus']; ?>"><i class="fa fa-google-plus"></i></a></li><?php }
        if($mt_options['mt_icon_dribble']!="") {?><li><a class="mt-soc-dribbble" href="<?php echo $mt_options['mt_icon_dribble']; ?>"><i class="fa fa-dribbble"></i></a></li><?php }
        if($mt_options['mt_icon_skype']!="") {?><li><a class="mt-soc-skype" href="<?php echo $mt_options['mt_icon_skype']; ?>"><i class="fa fa-skype"></i></a></li><?php }
        if($mt_options['mt_icon_delicious']!="") {?><li><a class="mt-soc-delicious"  href="<?php echo $mt_options['mt_icon_delicious']; ?>"><i class="fa fa-delicious"></i></a></li><?php }
        if($mt_options['mt_icon_pinterest']!="") {?><li><a class="mt-soc-pinterest" href="<?php echo $mt_options['mt_icon_pinterest']; ?>"><i class="fa fa-pinterest"></i></a></li><?php }
        if($mt_options['mt_icon_yahoo']!="") {?><li><a class="mt-soc-yahoo" href="<?php echo $mt_options['mt_icon_yahoo']; ?>"><i class="fa fa-yahoo"></i></a></li><?php }
        if($mt_options['mt_icon_amazon']!="") {?><li><a class="mt-soc-amazon" href="<?php echo $mt_options['mt_icon_amazon']; ?>"><i class="fa fa-shopping-cart"></i></a></li><?php }
        if(!empty($mt_options['mt_icon_instagram'])) { if($mt_options['mt_icon_instagram']!="") {?><li><a class="mt-soc-instagram" href="<?php echo $mt_options['mt_icon_instagram']; ?>"><i class="fa fa-instagram"></i></a></li><?php } }
        if($mt_options['mt_icon_rss']!="") {?><li><a class="mt-soc-rss" href="<?php echo $mt_options['mt_icon_rss']; ?>"><i class="fa fa-rss"></i></a></li><?php }

    ?> </ul> <?php
}
add_filter('mt_social_r','mt_social_r');

function mt_header_html() {

	$mt_options = get_option("themename_theme_options");

	if($mt_options['mt_header_bn']!="" and $mt_options['mt_header_bu']!=""){

		?><div id="header_html_area"><a href="<?php echo $mt_options['mt_header_bu']; ?>" class="mt_donation_button"><h2><?php echo $mt_options['mt_header_bn']; ?></h2></a></div><?php
	}
}

add_filter('mt_header_html','mt_header_html');



function mt_header_html_r() {

	$mt_options = get_option("themename_theme_options");

	if($mt_options['mt_header_bn']!="" and $mt_options['mt_header_bu']!=""){

		?><div class="mt-button-responsive text-center "><a href="<?php echo $mt_options['mt_header_bu']; ?>" class="mt_donation_button branch-name"><h2><?php echo $mt_options['mt_header_bn']; ?></h2></a></div><?php
	}
}

add_filter('mt_header_html_r','mt_header_html_r');



function mt_menu() {
	wp_nav_menu( array('theme_location'=>"primary",  'menu_class' => 'sf-menu',  'echo' => true, 'depth' => 0));

}

add_filter('mt_menu','mt_menu');

function mt_menu_responsive() {

	  wp_nav_menu( array('theme_location'=>'select_menu', 'fallback_cb' => false, 'walker'=>new select_menu_walker(), 'items_wrap' => '<select class="select-menu hidden-lg hidden-md" id="sec-selector" name="sec-selector" onchange="location.href = document.getElementById(\'sec-selector\').value;">%3$s</select>',  'container_id' => 'mobile_menu_secondary' ));

}
add_filter('mt_menu_responsive','mt_menu_responsive');


function mt_menu_html() {
	$mt_options = get_option("themename_theme_options");
	if($mt_options['mt_header_ep']=="1") { ?>

	    <div class="mt_menu_description"><p><?php echo $mt_options['mt_header_email']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mt_options['mt_header_phone']; ?></p></div>

	<?php  }
}

add_filter('mt_menu_html','mt_menu_html');

function mt_menu_html_r() {
	$mt_options = get_option("themename_theme_options");
	if($mt_options['mt_header_ep']=="1") { ?>

	    <div class="text-center "><p><?php echo $mt_options['mt_header_email']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mt_options['mt_header_phone']; ?></p></div>

	<?php  }
}

add_filter('mt_menu_html_r','mt_menu_html_r');



?>

<div class="mt-fixed-header <?php echo $mt_destop; ?>">

			<div class="container">

				<div class="row">

			    	<div class="col-md-4"><?php mt_logo(); ?></div>

			    	<div class="col-md-8">

			    		<div id="nav"> <?php mt_menu(); ?></div>

				    </div>

			    </div>

		    </div>

</div>

<?php

if(get_post_meta(get_the_ID(), "mt_style_header", true)!="style_default" and get_post_meta(get_the_ID(), "mt_style_header", true)!="")  {

	if(get_post_meta(get_the_ID(), "mt_style_header", true)=="style_4") { ?>

		<header id="header" class="<?php echo $mt_destop; ?>">

			<div class="container">

			<div class="row">

		    	<div class="col-md-12"><?php mt_logo(); ?></div>

			</div>

			<div class="row">

		    	<div class="col-md-12 "><?php mt_header_html_r(); ?></div>

		    </div>

		    <div class="row">

		    	<div class="col-md-12 text-center"><?php mt_social_r(); ?></div>

		    </div>


		    <div class="row">

				<div class="col-md-12 mt-description-fix-r"><?php mt_menu_html(); ?></div>

		    </div>
		     <div class="row">

				<div class="col-md-12 mt_lang_center"> <?php do_action('icl_language_selector');?></div>

		    </div>

			<div class="row">

				<div class="col-md-12 text-center"><?php mt_menu(); ?></div>

		    </div>


		</div>
		 </header>



		<?php } else if(get_post_meta(get_the_ID(), "mt_style_header", true)=="style_2") { ?>

		<header id="header" class="<?php echo $mt_destop; ?>">

			<div class="container">

				<div class="row">

			    	<div class="col-md-4"><?php mt_logo(); ?></div>

			    	<div class="col-md-8">

			    		<div id="nav"> <?php do_action('icl_language_selector');?><?php mt_menu(); ?></div>


				    </div>

			    </div>

		    </div>

		 </header>

		<?php } else if(get_post_meta(get_the_ID(), "mt_style_header", true)=="style_3") { ?>

		<header id="header" class="<?php echo $mt_destop; ?>">

			<div class="container">

				<div class="row">

			    	<div class="col-md-4"><?php mt_logo(); ?></div>

			    	<div class="col-md-8">

			    		<div id="nav"><?php do_action('icl_language_selector');?> <?php mt_menu(); ?></div>

				    </div>

			    </div>

		    </div>

		 </header>

		<?php } else { ?>

		<header id="header" class="<?php echo $mt_destop; ?>">
			<div class="container">
				<div class="row">

			    	<div class="col-md-4"><?php mt_logo(); ?></div>

			    	<div class="col-md-8 header-right">

			    		<?php mt_header_html(); ?>
			    		<?php mt_social(); ?>

				    </div>

			    </div>

				<div id="nav_1" class="row">

					<div class="<?php $mt_options = get_option("themename_theme_options");
					if($mt_options['mt_header_ep']!="1") { echo "col-md-12"; } else { echo "col-md-8"; } ?>"><?php mt_menu(); ?></div>
					<?php   if($mt_options['mt_header_ep']!="1") { } else { ?><div class="col-md-4"><?php do_action('icl_language_selector');?><?php mt_menu_html(); ?></div><?php } ?>


				</div>
			</div>

		</header>

	<?php }

} else {

	if($mt_options['mt_header_s']=="style_4") { ?>

		<header id="header" class="<?php echo $mt_destop; ?>">

			<div class="container">

			<div class="row">

		    	<div class="col-md-12"><?php mt_logo(); ?></div>

			</div>

			<div class="row">

		    	<div class="col-md-12 "><?php mt_header_html_r(); ?></div>

		    </div>

		    <div class="row">

		    	<div class="col-md-12 text-center"><?php mt_social_r(); ?></div>

		    </div>


		    <div class="row">

				<div class="col-md-12 mt-description-fix-r"><?php mt_menu_html(); ?></div>

		    </div>

		    <div class="row">

				<div class="col-md-12 mt_lang_center"> <?php do_action('icl_language_selector');?></div>

		    </div>

			<div class="row">

				<div class="col-md-12 text-center"><?php mt_menu(); ?></div>

		    </div>


		</div>
		 </header>



		<?php } else if($mt_options['mt_header_s']=="style_2") { ?>

		<header id="header" class="<?php echo $mt_destop; ?>">

			<div class="container">

				<div class="row">

			    	<div class="col-md-4"><?php mt_logo(); ?></div>

			    	<div class="col-md-8">

			    		<div id="nav"> <?php do_action('icl_language_selector');?><?php mt_menu(); ?></div>

				    </div>

			    </div>

		    </div>

		 </header>

		<?php } else if($mt_options['mt_header_s']=="style_3") { ?>

		<header id="header" class="<?php echo $mt_destop; ?>">

			<div class="container">

				<div class="row">

			    	<div class="col-md-4"><?php mt_logo(); ?></div>

			    	<div class="col-md-8">

			    		<div id="nav"> <?php do_action('icl_language_selector');?><?php mt_menu(); ?></div>

				    </div>

			    </div>

		    </div>

		 </header>

		<?php } else { ?>

		<header id="header" class="<?php echo $mt_destop; ?>">
			<div class="container">
				<div class="row">

			    	<div class="col-md-4"><?php mt_logo(); ?></div>

			    	<div class="col-md-8 header-right">

			    		<?php mt_header_html(); ?>
			    		<?php mt_social(); ?>

				    </div>

			    </div>

				<div id="nav_1" class="row">

					<div class="<?php $mt_options = get_option("themename_theme_options");
					if($mt_options['mt_header_ep']!="1") { echo "col-md-12"; } else { echo "col-md-8"; } ?>"><?php mt_menu(); ?></div>
					<?php   if($mt_options['mt_header_ep']!="1") { } else { ?><div class="col-md-4"><?php do_action('icl_language_selector');?><?php mt_menu_html(); ?></div><?php } ?>


				</div>
			</div>

		</header>

<?php }

}



if(!empty($mt_options["mt_mobile_s"])){ if($mt_options["mt_mobile_s"]=="old"){ mt_old_mobile(); } } else { mt_old_mobile(); }


function mt_old_mobile() {
?>
<section class="mt-responsive-header hidden-lg hidden-md">

<div class="container">

	<div class="row">

    	<div class="col-md-12"><?php mt_logo_r(); ?></div>

	</div>

	<div class="row">

    	<div class="col-md-12 "><?php mt_header_html_r(); ?></div>

    </div>

    <div class="row">

    	<div class="col-md-12 text-center"><?php mt_social_r(); ?></div>

    </div>


    <div class="row">

		<div class="col-md-12"><?php mt_menu_html_r(); ?></div>

    </div>
     <div class="row">

				<div class="col-md-12 mt_lang_center"> <?php do_action('icl_language_selector');?></div>

	</div>

	<div class="row">

		<div class="col-md-12 text-center"><?php mt_menu_responsive(); ?></div>

    </div>


</div>

</section>
<?php } add_filter('mt_old_mobile','mt_old_mobile');


/*-----------------------------------------------------------------------------------*/
/*	Slider
/*-----------------------------------------------------------------------------------*/



	    if(get_post_meta(get_the_ID(), "mt_page_slider_type", true)=="flex_slider"){

	    		echo '<section id="mt-slider-frame">'; function_slider_glass();  echo "</section>";
	    }

		if(get_post_meta(get_the_ID(), "mt_page_slider_type", true)=="shortcode_slider"){

				echo '<section id="mt-slider-frame-2">';  echo do_shortcode(get_post_meta(get_the_ID(), "mt_page_slider_shortcode", true));  echo "</section>";

		}


?>

<?php if ( $title=="on" or $title==""  ) { ?>
<section id="header-title">
	<div class="mt-shadow">
		<div class="container">
			<div class="row  mt-title wpb_animate_when_almost_visible wpb_top-to-bottom wpb_start_animation">

					<?php  if (is_singular("portfolio") or is_singular('causes') or is_singular('our-services') or is_singular("tribe_events")) {  ?>

						<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php the_title(); ?></h1></div>
						<div class="col-md-4 <?php echo $col_4; ?>"><?php next_post_link('%link','<div id="single-button-right"  class="icon-angle-right"></div>'); previous_post_link('%link','<div id="single-button-left"  class="icon-angle-left"></div>');  ?></div>


					<?php } else if (is_singular('our-doctors')) {  ?>

						<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php the_title(); ?></h1></div>
						<div class="col-md-4 <?php echo $col_4; ?>"><?php echo '<h2>'. get_post_meta(get_the_ID(),'mt_doctor_education', true). '</h2>';  ?></div>


					<?php } else if (is_single()){ ?>

						<?php if(function_exists( 'is_woocommerce' )) { ?>

							 <?php if (is_woocommerce() and is_product_category()) { ?>

									<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php single_cat_title( $prefix = '', $display = true ); ?></h1></div>
									<div class="col-md-4 <?php echo $col_4; ?>"><?php woocommerce_breadcrumb(); ?></div>

								<?php } else if (is_woocommerce()) { ?>

									<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php the_title(); ?></h1></div>
									<div class="col-md-4 <?php echo $col_4; ?>"><?php woocommerce_breadcrumb(); ?></div>

								<?php } else { ?>

										<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php the_title(); ?></h1></div>
										<div class="col-md-4 <?php echo $col_4; ?>"><?php next_post_link('%link','<div id="single-button-right"  class="icon-angle-right"></div>'); previous_post_link('%link','<div id="single-button-left"  class="icon-angle-left"></div>');  ?></div>

								<?php } ?>

						<?php } else { ?>

							<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php the_title(); ?></h1></div>
							<div class="col-md-4 <?php echo $col_4; ?>"><?php next_post_link('%link','<div id="single-button-right"  class="icon-angle-right"></div>'); previous_post_link('%link','<div id="single-button-left"  class="icon-angle-left"></div>');  ?></div>

						<?php } ?>

					<?php } else if (is_search()){ ?>

						<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php printf( __( 'Search Results for: %s', "madza_translate"  ), '' . get_search_query() . '' ); ?></h1></div>
						<div class="col-md-4 <?php echo $col_4; ?>"></div>

					<?php } else if (is_404()){ ?>

					    <divclass="col-md-8 <?php echo $col_8; ?>"><h1><?php printf( __( '404 page', "madza_translate"  ) ); ?></h1></div>
					    <div class="col-md-4 <?php echo $col_4; ?>"></div>

					<?php } else if (is_category()){ ?>

						<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php single_cat_title( $prefix = '', $display = true ); ?></h1></div>
						<div class="col-md-4 <?php echo $col_4; ?>"><?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){  dimox_breadcrumbs(); } ?></div>

					<?php } else if (is_tag()){ ?>

						<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php single_cat_title( $prefix = '', $display = true ); ?></h1></div>
						<div class="col-md-4 <?php echo $col_4; ?>"><?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){  dimox_breadcrumbs(); } ?></div>

					<?php } else { ?>

						<?php if(function_exists( 'tribe_is_event' )) { ?>

								<?php if (tribe_is_event() && !tribe_is_day() && !is_single()) { ?>

										<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php printf( __( 'Events', "madza_translate"  ) ); ?></h1></div>
										<div class="col-md-4 <?php echo $col_4; ?>"><?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){  dimox_breadcrumbs(); } ?></div>

								<?php } else { ?>

									<div class="col-md-<?php if ( $mt_options['mt_breadcrumb']!="1" AND $breadcrumbs != "on"){ echo "12"; } else { echo "8"; }?> <?php echo $col_8; ?>"><h1><?php the_title(); ?></h1></div>
									<?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){ ?><div class="col-md-4 <?php echo $col_4; ?>"><?php  dimox_breadcrumbs(); ?></div><?php } ?>

								<?php } ?>

						<?php } else if(function_exists( 'is_woocommerce' )) { ?>

							<?php if (is_woocommerce() and is_product_category()) { ?>

									<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php single_cat_title( $prefix = '', $display = true ); ?></h1></div>
									<div class="col-md-4 <?php echo $col_4; ?>"><?php woocommerce_breadcrumb(); ?></div>

								<?php } else if (is_woocommerce()) { ?>

									<div class="col-md-8 <?php echo $col_8; ?>"><h1><?php the_title(); ?></h1></div>
									<div class="col-md-4 <?php echo $col_4; ?>"><?php woocommerce_breadcrumb(); ?></div>

								<?php } else { ?>

									<div class="col-md-<?php if ( $mt_options['mt_breadcrumb']!="1" AND $breadcrumbs != "on"){ echo "12"; } else { echo "8"; }?> <?php echo  $col_8; ?>"><h1><?php the_title(); ?></h1></div>
									<?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){ ?><div class="col-md-4 <?php $col_4; ?>"><?php  dimox_breadcrumbs(); ?></div><?php } ?>

								<?php } ?>

						<?php } else { ?>

							<div class="col-md-<?php if ( $mt_options['mt_breadcrumb']!="1" AND $breadcrumbs != "on"){ echo "12"; } else { echo "8"; }?> <?php echo  $col_8; ?>"><h1><?php the_title(); ?></h1></div>
							<?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){ ?><div class="col-md-4 <?php echo $col_4; ?>"><?php  dimox_breadcrumbs(); ?></div><?php } ?>

						<?php } ?>
					<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php }  ?>
<div id="mb-content"> <div class="container<?php if(is_singular('mt_section')){ echo "-off"; } ?>">
