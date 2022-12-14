<?php
/**
 * Class: Boldgrid_Editor_Builder_Components
 *
 * Parse pages to find component usage.
 *
 * @since      1.3
 * @package    Boldgrid_Editor
 * @subpackage Boldgrid_Editor_Builder_Fonts
 * @author     BoldGrid <support@boldgrid.com>
 * @link       https://boldgrid.com
 */

/**
 * Class: Boldgrid_Editor_Builder_Components
 *
 * Parse pages to find component usage.
 *
 * @since      1.3
 */
class Boldgrid_Editor_Builder_Components {

	/**
	 * Components to scan the page for and the class used to ID them.
	 *
	 * @since 1.3.
	 *
	 * @var array
	 */
	protected static $component_types = array(
		'text' => 'bg-text-fx',
		'box' => 'bg-box',
		'button' => 'btn',
		'image' => 'bg-img',
	);

	/**
	 * Parse a post and find the components on it.
	 *
	 * @since 1.3.
	 *
	 * @param string $html HTML on page.
	 *
	 * @var array $components.
	 */
	public function parse_post( $html ) {
		$components = array();

		$dom = new DOMDocument();

		@$dom->loadHTML( $html );

		$xpath = new DOMXPath( $dom );

		foreach ( self::$component_types as $label => $component_ns ) {
			$components[ $label ] = $this->find_component_classes( $xpath, $component_ns );
		}

		$components['font'] = $this->find_fonts( $xpath );

		return $components;
	}

	/**
	 * Get all pages and scan them for components used.
	 *
	 * @since 1.3.
	 *
	 * @var array $components.
	 */
	public function get_components() {
		$components = array();

		$posts = Boldgrid_Layout::get_all_pages();
		foreach ( $posts as $post ) {
			$components = array_merge_recursive( $components, $this->parse_post( $post->post_content ) );
		}

		return $components;
	}

	/**
	 * Given a path, query for class name and return the attributes class and style.
	 *
	 * @since 1.3.
	 *
	 * @param SimpleXMLElement::xpath $xpath Queried Path.
	 * @param string                  $class Name of search Class.
	 *
	 * @return array $styles.
	 */
	public function find_component_classes( $xpath, $class ) {
		$styles = array();

		$query_string = sprintf( "//*[contains(concat(' ', normalize-space(@class), ' '), ' %s ')]", $class );
		foreach ( $xpath->query( $query_string ) as $node ) {
			$styles[] = array(
				'classes' => $node->getAttribute( 'class' ),
				'style' => $node->getAttribute( 'style' ),
			);
		}

		return $styles;
	}

	/**
	 * Given a path, query for attr data-font-family and return said attr.
	 *
	 * @since 1.3.
	 *
	 * @param SimpleXMLElement::xpath $xpath Queried Path.
	 *
	 * @return array $styles.
	 */
	public static function find_fonts( $xpath ) {
		$fonts = array();

		foreach ( $xpath->query( '//*[@data-font-family]' ) as $node ) {
			$fonts[] = $node->getAttribute( 'data-font-family' );
		}

		return $fonts;
	}
}
