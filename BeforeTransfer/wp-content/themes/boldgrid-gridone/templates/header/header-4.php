<header id="masthead" class="site-header" role="banner" <?php BoldGrid_Framework_Schema::header( true ); ?>>
	<?php BoldGrid::skip_link(  ); ?>
	<?php do_action( 'boldgrid_menu_secondary' ); ?>
	<div class="container">
		<?php do_action( 'boldgrid_header_top' ); ?>
		<?php dynamic_sidebar( 'boldgrid-widget-2' ); ?>
		<div class="row">
			<div class="col-md-6">
				<div class="site-branding">
					<?php do_action( 'boldgrid_site_title' ); ?>
					<?php do_action( 'boldgrid_print_tagline' ); ?>
				</div>
			</div>
			<div class="col-md-6">
				<?php do_action( 'boldgrid_menu_social' ); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<nav id="site-navigation" class="navbar navbar-default col-md-12" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div><!-- .navbar-header -->
					<?php do_action( 'boldgrid_menu_primary' ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		<?php do_action( 'boldgrid_header_bottom' ); ?>
	</div><!-- .container -->
	<?php do_action( 'boldgrid_menu_tertiary' ); ?>
</header><!-- #masthead -->
