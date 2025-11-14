<?php if (get_field('show_site_intro')): ?>
	<div class="site-intro">
	  <div class="container">
		  <?php if(get_field('si_heading')):?>
		   <h1 class="section-header"><?php echo get_field('si_heading');?></h1>
		 <?php else: ?>
		  <h1 class="section-header"><?php the_title(); ?></h1>
		<?php endif;?>
	  </div>
	</div>
<?php endif ?>