<?php
/**
 *
 * @package BoldGrid
 */

// Get the theme configs.
global $boldgrid_theme_framework;
$configs = $boldgrid_theme_framework->get_configs();
?>

<header id="masthead" class="<?php echo basename(__FILE__, '.php'); ?>" role="banner" <?php BoldGrid_Framework_Schema::header( true ); ?>>
	<?php BoldGrid::skip_link(  ); ?>
	<?php do_action( 'boldgrid_header_top' ); ?>
	<div class="col-md-12">
		<?php do_action( 'boldgrid_menu_secondary' ); ?>
		<?php dynamic_sidebar( 'boldgrid-widget-1' ); ?>
	</div><!-- .col -->
	<div class="col-md-12">
		<div class="site-branding">
			<?php do_action('boldgrid_site_title'); ?>
			<?php do_action('boldgrid_print_tagline'); ?>
		</div>
	</div>
	<div class="col-md-12">
		<nav id="site-navigation" class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div><!-- .navbar-header -->
			<div class="row">
				<div class="col-md-12">
					<?php do_action( 'boldgrid_menu_primary' ); ?>
				</div><!-- .col -->
			</div><!-- .row -->
		</nav><!-- #site-navigation -->
	</div><!-- .col -->

	<div class="col-md-12">
		<?php do_action('boldgrid_menu_social'); ?>
	</div>
	<?php do_action( 'boldgrid_header_bottom' ); ?>
</header><!-- #masthead -->
