<div class="bgtfw <?php echo BoldGrid::print_container_class( 'entry-footer' )?>">
<?php
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'bgtfw' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<i class="fa fa-pencil">',
		'</i>'
	);
?>
</div>
