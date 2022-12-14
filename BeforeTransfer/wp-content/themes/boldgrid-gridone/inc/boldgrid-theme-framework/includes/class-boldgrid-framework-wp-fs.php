<?php
/**
 * Class: Boldgrid_Framework_Wp_Fs
 *
 * Functions for interacting with WordPress Filesystem.
 *
 * @since      1.2.3
 * @package    Boldgrid_Framework
 * @subpackage Boldgrid_Framework_SCSS
 * @author     BoldGrid <support@boldgrid.com>
 * @link       https://boldgrid.com
 */

use Leafo\ScssPhp\Compiler;

/**
 * Class: Boldgrid_Framework_Wp_Fs
 *
 * Functions for interacting with WordPress Filesystem.
 *
 * @since      1.2.3
 */
class Boldgrid_Framework_Wp_Fs {

	/**
	 * Initialize the WP_Filesystem.
	 *
	 * @since 1.2.3
	 * @global $wp_filesystem WordPress Filesystem global.
	 */
	public function init() {
		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}
	}

	/**
	 * Save Compiled SCSS.
	 *
	 * @since 1.2.3
	 * @param string $compiled_scss Contains the compiled Bootstrap SCSS to save.
	 */
	public function save( $content, $file ) {
		self::init();
		global $wp_filesystem;
		// Write output to CSS file.
		$wp_filesystem->put_contents( $file, $content, FS_CHMOD_FILE );
	}
}
