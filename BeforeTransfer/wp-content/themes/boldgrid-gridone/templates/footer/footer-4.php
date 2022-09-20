<footer id="colophon" role="contentinfo" <?php BoldGrid_Framework_Schema::footer( true ); ?>>
	<div class="container">
		<?php do_action( 'boldgrid_footer_top' ); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="site-info">
					<?php dynamic_sidebar( 'boldgrid-widget-3' ); ?>
				</div><!-- .site-info -->
			</div><!-- .col -->
		</div><!-- .row -->
		<div class="row">
			<div class="col-md-12">
				<div class="site-info">
					<?php do_action( 'boldgrid_menu_footer_center' ); ?>
				</div><!-- .site-info -->
			</div><!-- .col -->
		</div><!-- .row -->
		<div id='attribution' class="row">
			<div class="col-md-12">
				<div class="attribution">
					<?php do_action( 'boldgrid_display_attribution_links' ); ?>
				</div><!-- .attribution -->
			</div><!-- .col -->
		</div><!-- .row -->
		<?php do_action( 'boldgrid_footer_bottom' ); ?>
	</div>
</footer><!-- #colophon -->
