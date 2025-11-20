<header class="site-header header0">
	 
  	<?php get_template_part( 'parts/covid-banner' ); ?>	

	<div class="top-line navbar navbar-expand-lg">
		<div class="container">
			<div class="row sh-tl-wrap">
				
				<div class="header-topline-menu navbar-expand-lg navbar-dark d-none d-lg-block ">
					<div  class="collapse navbar-collapse justify-content-center">
						<?php wp_nav_menu(
									array(
										'menu'			  => 'Top Nav Menu',
										'menu_class'      => 'navbar-nav m-auto',
										'fallback_cb'     => '',
										'menu_id'         => 'top-line-menu',
										'depth'           => 3,
										'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
									)
								); ?>

					</div>
				</div>
				<div class="sh-tl-utility">

					<span class="sh-search"><a href="#search" class="search-form-tigger" data-toggle="search-form" aria-label="Search">
						<?php 
							$search_icon = get_field('sh_uicon_search', 'option');
							if( !empty( $search_icon ) ): ?>
								<img src="<?php echo esc_url($search_icon['url']); ?>" alt="<?php echo esc_attr($search_icon['alt']); ?>" />
							<?php endif; ?>
					</a></span>
					<?php
			        $tel_number = get_field('global_phone_number','option');
			        $unformatted_tel_number = preg_replace("/[^0-9]/", '', $tel_number);?>
			        <?php if ($tel_number): ?>
			              <span class="shtl-ph"><a class="" href="tel:<?php echo $unformatted_tel_number;?>" aria-label="Call Us" title="Call Us">
							<?php 
							$call_icon = get_field('sh_uicon_phone', 'option');
							if( !empty( $call_icon ) ): ?>
								<img src="<?php echo esc_url($call_icon['url']); ?>" alt="<?php echo esc_attr($call_icon['alt']); ?>" />
							<?php endif; ?>
						  <span><?php echo $tel_number;?></span></a></span>
			        <?php endif ?>

			        <?php
			        $email_address = get_field('global_email', 'option');
			        if ($email_address): ?>
			            <span class="shtl-email"><a class="" href="mailto:<?php echo strtolower($email_address); ?>" title="Email Us" aria-label="Email Us">
							<?php 
							$email_icon = get_field('sh_uicon_email', 'option');
							if( !empty( $email_icon ) ): ?>
								<img src="<?php echo esc_url($email_icon['url']); ?>" alt="<?php echo esc_attr($email_icon['alt']); ?>" />
							<?php endif; ?>
						<span><?php echo $email_address; ?></span></a></span>
			        <?php endif ?>

				</div>
			</div>
		</div>
	</div>
	
	<div class="header-inner sh-sticky-wrap">

		<nav class="navbar navbar-expand-lg navbar-light sh-navbar">
			<div class="container">

				<?php if ( 'container' == $container ) : ?>
					<div class="container">
				<?php endif; ?>

						<!-- Your site title as branding in the menu -->
						<?php $logo = get_field('global_company_logo','option'); ?>
						<?php if ( !$logo && ! has_custom_logo() ) { ?>

							<?php if ( is_front_page() && is_home() ) : ?>

								<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

							<?php else : ?>

								<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

							<?php endif; ?>


						<?php } else {
							
			                if( !empty($logo) ): ?>
			                    <a href="<?php bloginfo('url'); ?>" class="site-logo"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>"></a>
			                <?php else: 
			                	the_custom_logo();
			                 endif;
						} ?><!-- end custom logo -->


						<!-- The WordPress Menu goes here -->
						<a href="javascript:void(0)" class="site-nav-container-screen" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Overlay"><span>Overlay</span></a>
						<div class="site-nav-container" id="navbarNavDropdown" class="collapse navbar-collapse">
							<div class="snc-header">
								<button class="navbar-toggler navbar-close-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Close', 'understrap' ); ?>">
									<span class="material-icons">close</span>
								</button>
							</div>
							<?php if ( has_nav_menu( 'primary' ) ) : ?>
								<?php wp_nav_menu(
									array(
										'theme_location'  => 'primary',
										'container_class' => 'mobile-nav main-menu',
										'menu_class'      => 'navbar-nav ml-auto',
										'fallback_cb'     => '',
										'menu_id'         => 'main-menu',
										'depth'           => 0,
										'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
									)
								); ?>
							<?php endif; ?>
						</div>

						<div class="utility-nav navbar-right">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
								<span class="material-icons">menu</span>
							</button>

							<span class="sh-search mx-md-3 d-lg-none"><a href="#search" class="search-form-tigger" data-toggle="search-form" aria-label="Search">
								<?php 
								$search_icon = get_field('sh_uicon_search_mob', 'option');
								if( !empty( $search_icon ) ): ?>
									<img src="<?php echo esc_url($search_icon['url']); ?>" alt="<?php echo esc_attr($search_icon['alt']); ?>" />
								<?php endif; ?>
							</a></span>

							<?php
					        $tel_number = get_field('global_phone_number','option');
					        $unformatted_tel_number = preg_replace("/[^0-9]/", '', $tel_number);?>
					        <?php if ($tel_number): ?>
					              <span class="sh-ph d-lg-none m-0"><a class="cms_phone" href="tel:<?php echo $unformatted_tel_number;?>" aria-label="Phone Number" title="<?php echo $unformatted_tel_number;?>">
								<?php 
								$call_icon = get_field('sh_uicon_phone_mob', 'option');
								if( !empty( $call_icon ) ): ?>
									<img src="<?php echo esc_url($call_icon['url']); ?>" alt="<?php echo esc_attr($call_icon['alt']); ?>" />
								<?php endif; ?>	
								  <span><?php echo $tel_number;?></span></a></span>
					        <?php endif ?>

							 <?php
					        $email_address = get_field('global_email', 'option');
					        if ($email_address): ?>
					            <span class="sh-email d-lg-none m-0"><a class="cms_email" href="mailto:<?php echo strtolower($email_address); ?>" title="Email Us" aria-label="Email Us">
								<?php 
								$email_icon = get_field('sh_uicon_email_mob', 'option');
								if( !empty( $email_icon ) ): ?>
									<img src="<?php echo esc_url($email_icon['url']); ?>" alt="<?php echo esc_attr($email_icon['alt']); ?>" />
								<?php endif; ?>	
								<span><?php echo $email_address; ?></span></a></span>
					        <?php endif ?>


							<?php 
							$link = get_field('request_quote_link', 'option');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <a class="btn-sh-desk d-none d-lg-inline-block m-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							    <a class="btn-sh-mob d-lg-none" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">RFQ</a>
							<?php endif; ?>
						</div>

					<?php if ( 'container' == $container ) : ?>
					</div><!-- .container -->
					<?php endif; ?>
			</div>
		</nav>
	</div>
</header>