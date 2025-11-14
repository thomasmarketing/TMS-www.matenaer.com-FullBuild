<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">




	    	<div class="feature-prod-wrapper">
				<div class="fpw-img">
				<?php if(has_post_thumbnail()): ?>
				<?php $title= get_the_title(); ?>
				<a href="<?php the_post_thumbnail_url(); ?>" class="lightbox featured-img"><?php the_post_thumbnail('large',array('alt' =>$title, 'title' =>$title)); ?></a>
				<?php endif; ?>								
				</div>
				<div class="entry-content">
					<?php the_content(); ?> 
				</div>
	    	</div>     	




			<div class="container navigation post-navigation">
			<div class="row nav-links justify-content-between">

				<?php
				$prev_post = get_previous_post(); 
				$id = $prev_post->ID ;
				$permalink = get_permalink( $id );
				?>
				<?php if(get_previous_post()): ?>
					<span class="nav-previous">
						<a href="<?php echo $permalink; ?>">
							<span class="meta-nav"><i class="fa fa-arrow-left"></i> Previous</span> 
							<?php echo $prev_post->post_title; ?>
						</a>
					</span>
					<?php endif;?>

				<?php 
				$next_post = get_next_post();
				$nid = $next_post->ID ;
				$permalink = get_permalink($nid);
				?>
					<?php if(get_next_post()): ?>
					<span class="nav-next">
						<a href="<?php echo $permalink; ?>">
							<span class="meta-nav">Next <i class="fa fa-arrow-right"></i></span>
							<?php echo $next_post->post_title; ?> 
						</a>
					</span>
					<?php endif;?>
				</div>	   
				</div>



	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
