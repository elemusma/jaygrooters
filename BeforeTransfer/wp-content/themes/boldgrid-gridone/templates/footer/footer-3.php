<footer id="colophon" role="contentinfo" <?php BoldGrid_Framework_Schema::footer( true ); ?>>
	<div class="container">
		<div class="row">
		<?php do_action( 'boldgrid_footer_top' ); ?>
		<?php dynamic_sidebar( 'boldgrid-widget-3' ); ?>
			<div class="col-md-9">
				<div class="site-info">
					<?php do_action( 'boldgrid_menu_footer_center' ); ?>
				</div><!-- .site-info -->
				<div class="attribution">
					<?php do_action( 'boldgrid_display_attribution_links' ); ?>
				</div><!-- .attribution -->
			</div><!-- .col -->
			<div class="col-md-3">
				<?php do_action( 'boldgrid_menu_footer_social' ) ?>
			</div><!-- .col -->
		</div><!-- .row -->
		<?php do_action( 'boldgrid_footer_bottom' ); ?>
	</div><!-- .container -->
</footer><!-- #colophon -->
