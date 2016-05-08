<?php
/*
*/ 

global $post, $col_4, $col_8; 

$mt_layout = get_post_meta(get_the_ID(), "layout_positions", true);
$count = get_post_meta(get_the_ID(), "mt_template_item_pp", true); 




$mt_float_layout = "";
$mt_float_sidebar = "";

if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}

?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="row">	
			
		<div class="col-md-12">
	    
	    		<?php the_content( __( '<div class="reed_more">Reed More &raquo;</div><div></div>', 'madza_translate' ) ); ?>
			   
	           <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'madza_translate' ), 'after' => '</div>' ) ); ?>
				
	           <div class="clear"></div>
		
	    </div><!--END POST -->
		    
	</div>
			    
<?php endwhile; wp_reset_query();  ?>

<div class="row">

	<div class="col-md-<?php if ($mt_layout != "full") { echo "8 "; echo $col_8; } else {  echo "12 "; } echo $mt_float_layout; ?> ">

		<div class="row">
		
		    <?php query_posts(array( 'post_type'=> 'our-staff', 'posts_per_page' => $count)); ?>
		    <?php global $more; $more = 0; while ( have_posts() ) : the_post(); 
			    
			    $staff_phone = get_post_meta(get_the_ID(), "mt_staff_phone", true);
				$staff_email = get_post_meta(get_the_ID(), "mt_staff_email", true);
				$staff_position = get_post_meta(get_the_ID(), "mt_staff_position", true);
				$staff_description = get_post_meta(get_the_ID(), "mt_staff_description", true);
			    
		    ?>
		    
			    <div class="col-md-4"> 
			                       
					<header class="entry-header">
						
						<?php if ( has_post_thumbnail() ) : ?>	
							  
							<div class="entry-page-image">
							
								<img class="cause-img"  src="<?php 
								
								$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( 999,999 ), false, '' ); 
								
								echo get_the_post_thumbnail( get_the_ID(), array(300, 170, 'bfi_thumb' => true), $src[0] );
								 
								 ?>" alt=""> 
								
							</div>
						<?php endif; ?>	
						
					</header>
					
					<h1 class="entry-title-2"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
							
					<?php if($staff_position!="") { ?><p class="entry-title-2"><?php echo $staff_position; ?></li></p><?php } ?>
							
					
					<?php if($staff_description!="") { ?><div class="entry-content"><p><?php echo $staff_description; ?></p></div><?php } ?>
		
					<footer class="entry-meta">
						
							
							<ul style="margin:0px!important; list-style:none;">
								
								<?php if($staff_phone!="") { ?><li><strong>Phone:</strong> <?php echo $staff_phone; ?></li><?php } ?>
								<?php if($staff_email!="") { ?><li><strong>E-mail:</strong> <?php echo $staff_email; ?></li><?php } ?>
						
							</ul>
							
						
					</footer>
					
				</div>
		       
			<?php endwhile; wp_reset_query(); ?>
			
		</div>
	
	</div>
	
	<?php if ($mt_layout != "full") { ?>
		
		<div class="col-md-4 <?php echo $mt_float_sidebar; echo $col_8;?> "><?php get_sidebar(); ?></div>
	
	<?php } ?>
			
</div>

<?php get_footer(); ?>