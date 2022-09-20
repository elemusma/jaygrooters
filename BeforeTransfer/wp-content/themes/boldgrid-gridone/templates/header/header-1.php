<?php
/**
 * Header Template 1
 *
 * This template utilizes off-canvas navigation menu for the primary menu.
 *
 * @package BoldGrid
 */

// Get the theme configs.
global $boldgrid_theme_framework;
$configs = $boldgrid_theme_framework->get_configs();
?>

<header id="masthead" class="<?php echo esc_attr( basename( __FILE__, '.php' ) ); ?>" role="banner" <?php BoldGrid_Framework_Schema::header( true ); ?>>
	<?php BoldGrid::skip_link(); ?>
	<?php do_action( 'boldgrid_menu_secondary' ); ?>
	<div class="container">
		<?php do_action( 'boldgrid_header_top' ); ?>
		<div class"row">
			<div class="col-md-12">
				<?php dynamic_sidebar( 'boldgrid-widget-2' ); ?>
			</div>
		</div>
	</div><!-- .container -->
	<div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
		<?php do_action( 'inside_offcanvas_nav' ); ?>
		<div class="site-branding">
			<?php do_action( 'boldgrid_site_title' ); ?>
			<?php do_action( 'boldgrid_print_tagline' ); ?>
		</div>
		<?php do_action( 'boldgrid_menu_social' ); ?>
		<?php do_action( 'boldgrid_menu_primary' ); ?>
		<?php if ( true === $configs['template']['navbar-search-form'] ) : ?>
			<?php get_template_part( 'templates/header/search' ); ?>
		<?php endif; ?>
	</div>
	<div class="navbar navbar-default navbar-fixed-top">
		<button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<?php do_action( 'boldgrid_menu_tertiary' ); ?>
	<div class="container">
		<?php do_action( 'boldgrid_header_bottom' ); ?>
	</div>
</header><!-- #masthead -->
