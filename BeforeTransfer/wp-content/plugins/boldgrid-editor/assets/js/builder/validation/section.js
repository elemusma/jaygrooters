var BOLDGRID = BOLDGRID || {};
BOLDGRID.EDITOR = BOLDGRID.EDITOR || {};
BOLDGRID.EDITOR.VALIDATION = BOLDGRID.EDITOR.VALIDATION || {};

( function ( $ ) {
	"use strict";

	BOLDGRID.EDITOR.VALIDATION.Section = {};
	var self = BOLDGRID.EDITOR.VALIDATION.Section;

	/**
	 * Get the closest element within context.
	 * 
	 * @since 1.2.7
	 */
	$.fn.closestContext = function( sel, context ) {
        var $closest;
        if ( this.is( sel ) ) {
            $closest = this;
        } else {
            $closest = this.parentsUntil( context ).filter( sel ).eq( 0 );
        }

        return $closest;
    };
    
	var defaultContainerClass = 'container',
        sectionClass = 'boldgrid-section',
		section = '<div class="' + sectionClass + '"></div>',
		container = '<div class="' + defaultContainerClass + '"></div>';

	/**
	 * Find all top level content elements that are siblings and not in rows and wrap them.
	 * 
	 * @since 1.2.7
	 */
	var wrapElementGroup = function () {
		
		var wrap,
			group = [],
			contentSelector = [
			    'h1',
			    'h2',
			    'h3',
			    'h4',
			    'h5',
			    'h6',
			    'h7',
			    'a',
			    'img',
			    'p',
			    'button',
			    'ul',
			    'ol',
			    'dl',
			    'form',
			    'table',
			    '[data-imhwpb-draggable="true"]',
			    '.wpview-wrap',
			    '.wpview',
			    'blockquote',
			    'code',
			    'abbr'
			].join(',');
		
		wrap = function () {
			$( group ).wrapAll( '<div class="' + defaultContainerClass + '"><div class="row"><div class="col-md-12">' );
			group = [];
		};
		
		self.$context.find('> *').each( function () {
			var $this = $( this );
			
			if ( $this.is( contentSelector ) ) {
				group.push( this );
			} else {
				wrap();
			}
		} );
		
		wrap();
	};
	
	/**
	 * Update content within context.
	 * 
	 * @since 1.2.7
	 * @param $context.
	 */
	self.updateContent = function ( $context ) {

		defaultContainerClass = BoldgridEditor.default_container || 'container-fluid';
		container = '<div class="' + defaultContainerClass + '"></div>';

		self.$context = $context;
		
		// Wrap sibling content elements not in rows, into rows.
		wrapElementGroup();
		
		// Add Class boldgrid-section to all parent of containers.
		addSectionClass();
		
		// wrap all containers in sections.
        wrapContainers();
        
        // If row has a parent add the section to the parent.
		addContainers();
        copyClasses();
	};

	/**
	 * Copy classes from container-fluid onto section.
	 * 
	 * @since 1.2.7
	 */
    var copyClasses = function() {
         self.$context.find( '.boldgrid-section > .container-fluid' ).each( function () {
			var $this = $( this ),
                classToAdd = $this.attr('class').replace('container-fluid', '');
             
             $this.attr( 'class', 'container-fluid' );
             $this.parent().addClass( classToAdd );
		} );
    };
    
	/**
	 * Add section class to container parents.
	 * 
	 * @since 1.2.7
	 */
    var addSectionClass = function () {
        self.$context.find( '.container' ).each( function () {
			var $this = $( this ),
                $parent = $this.parent();
			
            if( $parent.length && $parent[0] != self.$context[0] && false === $parent.hasClass( sectionClass ) ) {
               $parent.addClass( sectionClass );
            }
		} );
    };
    
	/**
	 * Wrap top level rows in containers.
	 * 
	 * @since 1.2.7
	 */
    var addContainers = function () {
    	self.$context.find( '.row:not(.row .row)' ).each( function () {
			var $this = $( this ),
                $parent = $this.parent();
			
            if ( ! $this.closestContext( '.container, .container-fluid', self.$context ).length ) {
                $this.wrap( container );
            }
            
            if ( ! $this.closestContext( '.boldgrid-section', self.$context ).length  ) {
                if ( $parent.length && $parent[0] != self.$context[0] ) {
                    $parent.addClass( sectionClass );
                } else {
                    $this.parent().wrap( section );
                }
            }
		} );
    };
    
	/**
	 * Wrap containers in sections.
	 * 
	 * @since 1.2.7
	 */
    var wrapContainers = function () {
    	self.$context.find( '.container, .container-fluid' ).each( function () {
			var $this = $( this );
			
			if ( ! $this.parent( '.boldgrid-section' ).length && false === $this.hasClass( sectionClass ) ){
                 $this.wrap( section );
			}
		} );
    };
    
} )( jQuery );
