<style type="text/css">
<?php

$mt_content_off = get_post_meta(get_the_ID(), "mt_content_on", true);

if($mt_content_off=="no"){ echo " #mb-content { padding: 0px!important; } "; }


$mt_options = get_option("themename_theme_options");


if($mt_options['mt_responsive']=='responsive_no') {?> .container { width: 970px !important; max-width: none !important;} <?php }

#if($mt_options['mt_header_h']!="" or $mt_options['mt_header_h']!="80"){ echo ".mt_style_header_2 #header, .mt_style_header_3 #header { height:"; echo $mt_options['mt_header_h']; echo"px }"; }

if($mt_options['mt_header_t']!="" and $mt_options['mt_header_t']!="20"){ echo ".mt_style_header_1 .header-right, .mt_style_header_2 .sf-menu, .mt_style_header_3 .sf-menu { margin-top:"; echo $mt_options['mt_header_t']; echo"px!important }"; }

global $post; $section_id = get_the_ID();

$args = array( 'post_type' => 'mt_section', 'posts_per_page' => 999 );

$query = new WP_Query( $args );

while ( $query->have_posts() ) : $query->the_post();

	global $post, $page;

	if(get_post_meta($section_id, "mb_page_sections_in", true)!="" or get_post_meta(get_the_ID(), "mt_in_all_pages", true)=="yes" or get_the_ID()==get_the_ID()) {

	$mt_section_opacity_bg = get_post_meta(get_the_ID(), "mt_page_section_color_bg_opacity", true);
	$mt_section_opacity_bg_strong = get_post_meta(get_the_ID(), "mt_page_section_color_bg_opacity_strong", true);

?>.mt-section-bg-<?php echo get_the_ID(); ?> {
	background-color: <?php echo $mt_section_opacity_bg; ?>!important;
	opacity: 0.<?php echo $mt_section_opacity_bg_strong; ?>!important;
	margin-top: -<?php echo get_post_meta(get_the_ID(), "mt_padding_top", true);?>px;
}
.mt-style-<?php echo get_the_ID(); ?> { <?php

				$padding_top = get_post_meta(get_the_ID(), "mt_padding_top", true);
				$padding_bottom = get_post_meta(get_the_ID(), "mt_padding_bottom", true);

				if(get_post_meta(get_the_ID(), "mt_padding_top", true)!="")		{ echo "padding-top:"; echo $padding_top; echo "px; "; }
				if(get_post_meta(get_the_ID(), "mt_padding_bottom", true)!="") 	{ echo "padding-bottom:"; echo $padding_bottom; echo"px; ";   }


				$mt_section_bg = get_post_meta(get_the_ID(), "mt_bg", true);
				$mt_section_bg_pattern = get_post_meta(get_the_ID(), "mt_page_section_color_bg_patterns", true);

				if($mt_section_bg['background-image'] != ""){

					echo "background-image:url('"; echo $mt_section_bg['background-image']; echo "');";

				} else if($mt_section_bg_pattern!="off") {

					echo "background-image:url('"; echo get_template_directory_uri(); echo $mt_section_bg_pattern; echo "')!important; background-repeat:repeat; background-position:center top;";

				}



				if($mt_section_bg['background-color'] != "")					{ echo "background-color:"; echo $mt_section_bg['background-color']; echo ";";  }
				if($mt_section_bg['background-repeat'] != "")					{ echo "background-repeat:"; echo $mt_section_bg['background-repeat']; echo ";";  }
				if($mt_section_bg['background-position'] != "")					{ echo "background-position:"; echo $mt_section_bg['background-position']; echo ";"; }
				if($mt_section_bg['background-attachment'] != "")				{ echo "background-attachment:"; echo $mt_section_bg['background-attachment']; echo ";"; }

				if(get_post_meta(get_the_ID(), "mt_css", true)!="")				{ echo get_post_meta(get_the_ID(), "mt_css", true); }

		?>}<?php

	}

endwhile; wp_reset_query();

	global $post;
	if ( get_post_meta(get_the_ID(), "mt_colors_page_2", true)!="") {

					$mt_color_type = get_post_meta(get_the_ID(), "mt_colors_page_2", true);

	} else {

					$mt_color_type = get_option("default_color");

					if(empty($mt_color_type)) {
						$mt_color_type = "#7db6d3";
					}

	}


$mt_slider_frame = get_post_meta(get_the_ID(), "mt_page_slider_color_bg", true);
$mt_slider_patterns = get_post_meta(get_the_ID(), "mt_page_slider_color_bg_patterns", true);

if(get_post_meta(get_the_ID(), "mt_page_slider_type", true)!="off")  {

			if ( ! empty( $mt_slider_frame )) {

				if($mt_slider_frame['background-image'] != "")			{

					echo "#mt-slider-frame { background-image:url('"; echo $mt_slider_frame['background-image']; echo "')!important;}";

				} else if($mt_slider_patterns!="off") {

					echo "#mt-slider-frame { background-image:url('"; echo get_template_directory_uri(); echo $mt_slider_patterns; echo "')!important; background-repeat:repeat; background-position:center top;}";

				}

			} else if($mt_slider_patterns!="off") {

				echo "#mt-slider-frame { background-image:url('"; echo get_template_directory_uri(); echo $mt_slider_patterns; echo "')!important; background-repeat:repeat; background-position:center top;}";

			}

			if ( ! empty( $mt_slider_frame )) {

				if($mt_slider_frame['background-repeat'] != "")			{ echo "#mt-slider-frame { background-repeat:"; echo $mt_slider_frame['background-repeat']; echo "!important;}";  }
				if($mt_slider_frame['background-position'] != "")		{ echo "#mt-slider-frame { background-position:"; echo $mt_slider_frame['background-position']; echo "!important;}";  }
				if($mt_slider_frame['background-attachment'] != "")		{ echo "#mt-slider-frame { background-attachment:"; echo $mt_slider_frame['background-attachment']; echo "!important;}";  }
				if($mt_slider_frame['background-color'] != "")			{ echo "#mt-slider-frame { background-color:"; echo $mt_slider_frame['background-color']; echo "!important;}";  }
			}
}





?>


/* Mega Menu */

#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li:hover > .item_link,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:hover,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:focus,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link { border-color: <?php echo $mt_color_type; ?>!important; }


#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li:hover > .item_link,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:hover,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:focus,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li:hover > .item_link *,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link *,

#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:hover *, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:focus *, #mega_main_menu.primary ul li.default_dropdown .mega_dropdown > li:hover > .item_link *, #mega_main_menu.primary ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link *, #mega_main_menu.primary ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover *, #mega_main_menu.primary ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link *, #mega_main_menu.primary ul li.post_type_dropdown .mega_dropdown > li:hover > .item_link *, #mega_main_menu.primary ul li.post_type_dropdown .mega_dropdown > li.current-menu-item > .item_link *, #mega_main_menu.primary ul li.grid_dropdown .mega_dropdown > li:hover > .item_link *, #mega_main_menu.primary ul li.grid_dropdown .mega_dropdown > li a:hover *, #mega_main_menu.primary ul li.grid_dropdown .mega_dropdown > li.current-menu-item > .item_link *, #mega_main_menu.primary ul li.post_type_dropdown .mega_dropdown > li > .processed_image:hover > .cover > a > i { color: <?php echo $mt_color_type; ?>!important; }


.current-menu-item .item_link { background-color: <?php echo $mt_color_type; ?>!important;  }


/* Woocommerce style */

.onsale { background-color: <?php echo $mt_color_type; ?>!important; }
span.current { color: <?php echo $mt_color_type; ?>!important; }

/* other style */

.cl-effect-11 a,
.cl-effect-11 a::before { border-top-color: <?php echo $mt_color_type; ?>!important;  }


.cl-effect-10 a::before,
.cl-effect-13 a:hover,
.cl-effect-13 a:focus,
.cl-effect-17 a::before,
.cl-effect-21 a:hover,
.cl-effect-21 a:focus { color: <?php echo $mt_color_type; ?>!important;  }

.cl-effect-13 a:hover::before,
.cl-effect-13 a:focus::before {
	color: <?php echo $mt_color_type; ?>!important;
	text-shadow: 10px 0 <?php echo $mt_color_type; ?> , -10px 0 <?php echo $mt_color_type; ?>!important;
}

.cl-effect-2 a:hover { color: white!important; }

.csstransforms3d .cl-effect-2 a span::before,
.cl-effect-6 a::before,
.cl-effect-6 a::after,
.cl-effect-7 a::before,
.cl-effect-7 a::after,
.cl-effect-9 a::before,
.cl-effect-9 a::after,
.cl-effect-14 a::before,
.cl-effect-14 a::after,
.cl-effect-17 a::after,
.cl-effect-18 a::before,
.cl-effect-18 a::after,
.cl-effect-19 a span,
.csstransforms3d .cl-effect-19 a span::before
.cl-effect-19 a:hover span,
.cl-effect-19 a:focus span,
.csstransforms3d .cl-effect-19 a:hover span::before,
.csstransforms3d .cl-effect-19 a:focus span::before,
.cl-effect-21 a::before,
.cl-effect-21 a::after { background-color: <?php echo $mt_color_type; ?>!important;  }

.glass-dark .glass-arrows:hover,
.glass-dark .glass-arrows-right:hover,
.glass-dark .glass-title a:hover,
.glass-arrows:hover,
.glass-arrows-right:hover,
.glass-arrows-pause:hover,
.glass-arrows-play:hover,
.glass-title a:hover { background-color: <?php echo $mt_color_type; ?>!important; color: white!important; border-color: <?php echo $mt_color_type; ?>!important; }

.mt_donation_button {  background-color: <?php echo $mt_color_type; ?>; }


#mb_home_button_home, #mb_home_button:hover,
ul.sf-menu li.current-cat > a, div.sf-menu ul li.current-cat > a,
ul.sf-menu li.current-menu-item > a, div.sf-menu ul li.current-menu-item > a,
ul.sf-menu li.current_page_item > a, div.sf-menu ul li.current_page_item > a,
ul.sf-menu li.current-menu-ancestor > a, div.sf-menu ul  li.current-menu-ancestor > a,
ul.sf-menu li a:hover, div.sf-menu ul li a:hover,
.single-post #nav ul li.blogbutton a,
.single-portfolio #nav ul li.portfoliobutton a,
.mt_style_header_2 .sf-menu ul li.current-cat > a,
.mt_style_header_2 .sf-menu ul li.current_page_item > a,
.mt_style_header_2 .sf-menu ul li.current-menu-item > a,
.mt_style_header_2 .sf-menu ul li a:hover,
.mt_style_header_2 .sf-menu ul li.current-menu-ancestor > a,
.mt_style_header_3 .sf-menu ul li.current-cat > a,
.mt_style_header_3 .sf-menu ul li.current_page_item > a,
.mt_style_header_3 .sf-menu ul li.current-menu-item > a,
.mt_style_header_3 .sf-menu ul li a:hover,
.mt_style_header_3 .sf-menu ul li.current-menu-ancestor > a{
	border-top-color: <?php echo $mt_color_type; ?>;
	color: <?php echo $mt_color_type; ?>!important;
}

body.mt_style_header_2 .sf-menu li.current-cat > a,
body.mt_style_header_2 .sf-menu li.current_page_item > a,
body.mt_style_header_2 .sf-menu li.current-menu-item > a,
body.mt_style_header_2 .sf-menu li a:hover,
body.mt_style_header_2 .sf-menu li.current-menu-ancestor > a{
	background-color: <?php echo $mt_color_type; ?>;
	color: white!important
}

body.mt_style_header_3 .sf-menu li.current-cat > a,
body.mt_style_header_3 .sf-menu li.current_page_item > a,
body.mt_style_header_3 .sf-menu li.current-menu-item > a,
body.mt_style_header_3 .sf-menu li a:hover,
body.mt_style_header_3 .sf-menu li.current-menu-ancestor > a{
	background-color: <?php echo $mt_color_type; ?>;
	color: white!important
}

ul.sf-menu li.current-cat > a, div.sf-menu ul li.current-cat > a,
ul.sf-menu li.current-menu-item > a, div.sf-menu ul li.current-menu-item > a,
ul.sf-menu li.current_page_item > a, div.sf-menu ul li.current_page_item > a,
ul.sf-menu li.current-menu-ancestor > a, div.sf-menu ul  li.current-menu-ancestor > a,
ul.sf-menu li a:hover, div.sf-menu ul li a:hover,

a:hover,
input:hover,
#full-page-home div div ul li a:hover,
.menu_categories ul li ul li a:hover,
#full-page-home div div ul li ul li a:hover,
.meta-date-blog a:hover,
.meta-category-blog a:hover,
.meta-author-blog a:hover,
.meta-tags-blog a:hover,
.meta-comment-blog a:hover,
.line-breadcrumb-ultra p a:hover,
.line-title-ultra p a:hover,
.comment-author.vcard a:hover,
#title-right-single a div:hover,
.reply a:hover,
.logged-in-as a:hover,
#post-link-button a:hover,
.homepage-blog-post-meta a:hover,
.search-input:hover,
ul#filter a:hover,
.portfolio_link:hover,
.more-link-2 a:hover,
.more-diva-2 a:hover,
.entry-title a:hover,
#sub-footer a:hover,
ul#filterm li.current a,
ul#filterm li a:hover,
.menu_categories .current-cat a,
.menu_categories ul li:hover a,
.footer_widget_midle ul li a:hover,
p.price .amount { color: <?php echo $mt_color_type; ?>!important; }


ul.sf-menu ul li.current-cat > a, div.sf-menu ul ul li.current-cat > a,
ul.sf-menu ul li.current_page_item > a, div.sf-menu ul ul li.current_page_item > a,
ul.sf-menu ul li.current-menu-item > a, div.sf-menu ul ul li.current-menu-item > a,
ul.sf-menu ul li.current-menu-ancestor > a, div.sf-menu ul ul li.current-menu-ancestor > a,
ul.sf-menu ul ul li.current-cat > a, div.sf-menu ul ul ul li.current-cat > a,
ul.sf-menu ul ul li.current-menu-item > a, div.sf-menu ul ul ul li.current-menu-item > a,
ul.sf-menu ul ul li.current_page_item > a, div.sf-menu ul ul ul li.current_page_item > a,
ul.sf-menu ul ul li.current-menu-ancestor > a, div.sf-menu ul ul ul li.current-menu-ancestor > a,
ul.sf-menu ul li a:hover, div.sf-menu ul ul li a:hover {
	border-bottom-color: <?php echo $mt_color_type; ?>;
	color: <?php echo $mt_color_type; ?>!important;
}


.port-file-3 .more-link span:hover,
.post-format-image, .post-format-image-quote, .post-format-image-video, .post-format-image-image, .post-format-image-link, .post-format-image-gallery,
.entry-meta .more-link span:hover,
.more-link.mt-donate-link span,
.ewd_form input[type="submit"]:hover,
#mb-content  .wpcf7-submit:hover,
.pagination-link span:hover,
#tribe-bar-form .tribe-bar-submit input[type=submit],
.tribe-events-read-more:hover,
.tribe-events-nav-left a:hover,
.tribe-events-list .tribe-events-event-cost span,
.tribe-events-cost,
.tribe-events-back a:hover,
.tribe-events-nav-previous a:hover,
.tribe-events-nav-next a:hover,
.tribe-events-widget-link a:hover,
table.tribe-events-calendar th,
#easy_widget_form .easy-submit .easybutton,
#easyFrontendFormular .easy-button,
#showCalender td.calendar-cell.calendar-cell-empty,
.single_add_to_cart_button:hover,
.woocommerce-message a:hover,
.button.wc-forward:hover {
	background-color: <?php echo $mt_color_type; ?>!important; color:white!important;
}

.dark-background,
#header-title,
.dark-background-2,
.wpb_button:hover,
#mb-content .form-submit #submit:hover,
.progress-striped .bar,
.grid figcaption a {  background-color: <?php echo $mt_color_type; ?>!important; }

.port-file-3 .more-link span:hover,
.wpb_button:hover,
#mb-content .wpcf7-submit:hover,
.entry-meta .more-link span:hover,
.mt_donation_button,
#mb-content .form-submit #submit:hover,
.more-link.mt-donate-link span,
.ewd_form input[type="submit"]:hover,
.grid figcaption a,
#tribe-bar-form .tribe-bar-submit input[type=submit],
.tribe-events-read-more:hover,
.tribe-events-nav-left a:hover,
.tribe-events-back a:hover,
.tribe-events-nav-previous a:hover,
.tribe-events-nav-next a:hover,
.tribe-events-widget-link a:hover,
#tribe-events-content table.tribe-events-calendar,
#tribe-events-content .tribe-events-calendar td,
#easy_widget_form .easy-submit .easybutton,
#easyFrontendFormular input.easy-button {  border-color: <?php echo $mt_color_type; ?>!important; }



<?php





/* --------------------------------------------------------------------------------------- Footer Style */

if(ot_get_option("footer_partner_logo")!="" AND ot_get_option("footer_partner")=="1"){ ?> #footer-logos { background: url(<?php echo ot_get_option("footer_partner_logo"); ?>) center no-repeat!important; } <?php }


/* --------------------------------------------------------------------------------------- Background Style */
global $post;

$background_color = get_post_meta(get_the_ID(), "madza_style_background_color", true);
$background_color_custom = ot_get_option("color_background");



if(is_front_page()) {

	$mt_slider_height = ot_get_option('mt_homepage_slider_height');
	echo "#mt_3d_slider #viewport, #mt_3d_slider #box, #mt_3d_slider .slide, #slider-nivo, #slider_image { height: ". $mt_slider_height ."px!important; }";
	echo "#mt_3d_slider #time-indicator { top: ". $mt_slider_height ."px!important; } #mb_home_button { background: rgba(19, 19, 19, 0.3)!important; }";

} else {

	$mt_slider_height = get_post_meta(get_the_ID(), "mt_page_slider_height", true);
	echo "#mt_3d_slider #viewport, #mt_3d_slider #box, #mt_3d_slider .slide, #slider-nivo, #slider_image { height: ". $mt_slider_height ."px!important; }";
	echo "#mt_3d_slider #time-indicator { top: ". $mt_slider_height ."px!important; }";

}





/* ---------------------------------------------------------------------------------------  Background Style */


$mt_page_bg = get_post_meta(get_the_ID(), "m_page_background", true);

$mt_page_bg_image = "no";
if ( $mt_page_bg !="") {  if ( $mt_page_bg['background-image'] !="" ) { $mt_page_bg_image = "yes"; } }

$mt_page_bg_repeat = "no";
if ( $mt_page_bg !="") { if ( $mt_page_bg['background-repeat'] !="" ) { $mt_page_bg_repeat = "yes"; } }

$mt_page_bg_color = "no";
if ( $mt_page_bg !="") { if ( $mt_page_bg['background-color'] !="" ) { $mt_page_bg_color = "yes"; } }



	$mt_homepage_bg_p = get_option("bg_default_color");

	$mt_homepage_bg_p_image = get_option("themename_theme_options");

	$mt_page_patterns = get_post_meta(get_the_ID(), "mt_page_page_color_bg_patterns", true);

	if($mt_page_bg_image == "yes" and $mt_page_bg_repeat == "yes" or $mt_page_bg_color == "yes" or $mt_page_patterns!="" and $mt_page_patterns!="off" ) {


		if ( ! empty( $mt_page_bg )) {
			if($mt_page_bg['background-image'] != ""){

				echo "body { background-image:url('"; echo $mt_page_bg['background-image']; echo "')!important;}";

			} else if($mt_page_patterns!="off") {

				echo "body { background-image:url('"; echo get_template_directory_uri(); echo $mt_page_patterns; echo "')!important; background-repeat:repeat; background-position:center top;}";

			}

		} else if($mt_page_patterns!="off") {

			echo "body { background-image:url('"; echo get_template_directory_uri(); echo $mt_page_patterns; echo "')!important; background-repeat:repeat; background-position:center top;}";

		}

		if ( ! empty( $mt_page_bg )) {

			if($mt_page_bg['background-repeat'] != "")			{ echo "body { background-repeat:"; echo $mt_page_bg['background-repeat']; echo "!important;}";  }
			if($mt_page_bg['background-position'] != "")		{ echo "body { background-position:"; echo $mt_page_bg['background-position']; echo "!important;}";  }
			if($mt_page_bg['background-attachment'] != "")		{ echo "body { background-attachment:"; echo $mt_page_bg['background-attachment']; echo "!important;}";  }

		}

	} else if ($mt_homepage_bg_p_image !="") {

		if($mt_homepage_bg_p_image['image_upload_test']!="" and $mt_homepage_bg_p_image['background_repeat'] != "full")  {

			if($mt_homepage_bg_p_image['background_repeat'] != "")		{ echo "body { background-repeat:"; echo $mt_homepage_bg_p_image['background_repeat']; echo "!important;}";  }
			if($mt_homepage_bg_p_image['background_position'] != "")		{ echo "body { background-position:"; echo $mt_homepage_bg_p_image['background_position']; echo "!important;}";  }
			if($mt_homepage_bg_p_image['image_upload_test'] != "")	{ echo "body { background-image:url('"; echo $mt_homepage_bg_p_image['image_upload_test']; echo "')!important;}";  }
			if($mt_homepage_bg_p_image['background_attachment'] != "")	{ echo "body { background-attachment:"; echo $mt_homepage_bg_p_image['background_attachment']; echo "!important;}";  }
		}
	}


	if ( $mt_page_bg !="") {

		if($mt_page_bg['background-color'] != "")	{

			echo "body { background-color:"; echo $mt_page_bg['background-color']; echo "!important;}";

		}

	} else {

			if($mt_homepage_bg_p!="") {

				echo "body { background-color:"; echo $mt_homepage_bg_p; echo "!important;}";

			}

		}





$title_bg=get_post_meta(get_the_ID(), "m_title_backgrounds", true);


if($title_bg = "http://medical.madza-wordpress-premium-themes.com/wp-content/uploads/2014/04/page_title_bg.png") { $title_bg = ""; }


$mt_title_bg_image = "no";
if ( $title_bg !="") {  if ( $title_bg['background-image'] !="" ) { $mt_title_bg_image = "yes"; } }

$mt_title_bg_color = "no";
if ( $title_bg !="") { if ( $title_bg['background-color'] !="" ) { $mt_title_bg_color = "yes"; } }


$mt_title_patterns = get_post_meta(get_the_ID(), "mt_page_title_color_bg_patterns", true);
$mt_title_customize = get_option("themename_theme_options");

if($mt_title_bg_image == "yes" or $mt_title_bg_color == "yes" or $mt_title_patterns!="" and $mt_title_patterns!="off" ) {

	if( get_post_meta(get_the_ID(), "m_title_backgrounds", true) != "") {

		if($title_bg['background-color'] != "")			{ echo "#header-title { background-color:"; echo $title_bg['background-color']; echo "!important;}";  }
		if($title_bg['background-image'] != "")			{ echo "#header-title { background-image:url('"; echo $title_bg['background-image']; echo "')!important;}";  }
		if($title_bg['background-repeat'] != "")		{ echo "#header-title { background-repeat:"; echo $title_bg['background-repeat']; echo "!important;}";  }
		if($title_bg['background-position'] != "")		{ echo "#header-title { background-position:"; echo $title_bg['background-position']; echo "!important;}";  }
		if($title_bg['background-attachment'] != "")	{ echo "#header-title { background-attachment:"; echo $title_bg['background-attachment']; echo "!important;}";  }
		if($title_bg['background-size'] != "")			{ echo "#header-title { background-size:"; echo $title_bg['background-size']; echo "!important;}";  }

	} else if($mt_title_patterns!="off") {

		echo "#header-title  { background-image:url('"; echo get_template_directory_uri(); echo $mt_title_patterns; echo "')!important; background-repeat:repeat; background-position:center top;}";

	}

} else if ($mt_title_customize !="") {

	if($mt_title_customize['image_upload_test_title']!="")  {

			if($mt_title_customize['background_repeat_title'] != "")		{ echo "#header-title { background-repeat:"; echo $mt_title_customize['background_repeat_title']; echo "!important;}";  }
			if($mt_title_customize['background_position_title'] != "")		{ echo "#header-title { background-position:"; echo $mt_title_customize['background_position_title']; echo "!important;}";  }
			if($mt_title_customize['image_upload_test_title'] != "")		{ echo "#header-title { background-image:url('"; echo $mt_title_customize['image_upload_test_title']; echo "')!important;}";  }
			if($mt_title_customize['background_attachment_title'] != "")	{ echo "#header-title { background-attachment:"; echo $mt_title_customize['background_attachment_title']; echo "!important;}";  }
	}
}


/* --------------------------------------------------------------------------------------- Font Style */

$mt_fonts = get_option("themename_theme_options");


	if($mt_fonts['font_css']!=""){
		echo ".nav li a strongs, #title-button, .nivo-caption-bg h1, .tp-simpleresponsive .caption, .mega_dropdown .post_title {"; echo $mt_fonts['font_css']; echo "}";
        echo "h1,h2,h3,h4,h5,h6,h1 a,h2 a,h3 a,h4 a,h5 a,h6 a,#title-left h1, .entry-title p, .entry-title p, #tribe-bar-form label {"; echo $mt_fonts['font_css']; echo "}";
	 } else {
		echo ".nav li a strongs, #title-button, .nivo-caption-bg h1, .tp-simpleresponsive .caption, .mega_dropdown .post_title{ font-family: 'Cabin', sans-serif;}";
        echo "h1,h2,h3,h4,h5,h6,h1 a,h2 a,h3 a,h4 a,h5 a,h6 a, .entry-title p, #tribe-bar-form label {font-family: 'Cabin', sans-serif;}";
	 }




/* --------------------------------------------------------------------------------------- Color Style */


 ?>


<?php  ?>
</style>
