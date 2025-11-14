<?php if(is_front_page()): ?>
	<?php if( get_field('hb_on_off','options') == true ): ?>
		<div class="hi-wrap top-banner-module open">
			<div class="inner-wrap">
				<div class="hiw-left">
					<h2 class="hi-heading"><?php echo get_field('banner_content','options'); ?> </h2>
	        	<a href="javacsript:void(0)" class="top-banner-close" tabindex="0" aria-label="Close Top Banner"><i class="fa fa-window-close" aria-hidden="true"></i></a>
	        </div>
			</div>
		</div>
	<?php endif; ?>	
<?php endif; ?>