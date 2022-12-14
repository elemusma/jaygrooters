var BOLDGRID = BOLDGRID || {};
BOLDGRID.EDITOR = BOLDGRID.EDITOR || {};

( function ( $ ) {
	"use strict";

	var self,
		BG = BOLDGRID.EDITOR;

	BOLDGRID.EDITOR.Menu = {

		$element : null,
		
		$activeElement : null,
		
		$mceContainer : null,

		/**
		 * Initialize the menu control.
		 * 
		 * @since 1.2.7
		 * @return jQuery $element.
		 */
		init : function () {

			this.create();
			this.setupMenuDrag();

			return this.$element;
		},

		/**
		 * Get the target clicked on that corresponds to the menu item highlighted.
		 * 
		 * @since 1.2.7
		 * @param BG.Control control.
		 * @return jQuery
		 */
		getTarget : function ( control ) {
			return this.$element.targetData[ control.name ];
		},
		
		/**
		 * Get the current element being modified.
		 * 
		 * @since 1.2.7
		 * @return jQuery Element being modified.
		 */
		getCurrentTarget : function () {
			
			var $target;
			
			if ( BG.Panel.currentControl ) {
				if( BG.Panel.currentControl.getTarget ) {
					// Allow control to override the way a target is aquired.
					$target = BG.Panel.currentControl.getTarget();
				} else {
					$target = self.getTarget( BG.Panel.currentControl );
				}
			}
			
			return $target;
		},

		/**
		 * Create the menu element.
		 * 
		 * @since 1.2.7
		 */
		create : function () {
			
			this.$mceContainer = $( '#' + tinymce.activeEditor.theme.panel._items[0]._id );
			this.$element = $( wp.template( 'boldgrid-editor-control-menu' )() );
			this.$mceContainer.append( this.$element );
			this.$element.items = [];
		},

		/**
		 * Setup the ability to drag the menu.
		 * 
		 * @since 1.2.7
		 */
		setupMenuDrag : function() {
			this.$element.find( 'ul' ).draggable( {
				containment: '#wp-content-editor-container',
				scroll : false,
				axis: "x",
				cancel: "li"
			} );
		},

		/**
		 * Create the list item for the registered control.
		 * 
		 * @since 1.2.7
		 * @param BG.Control control.
		 */
		createListItem : function ( control ) {

			var $dropdownUl,
				$li = $('<li></li>').attr( 'data-action', 'menu-' + control.name ),
				$icon = $( '<span></span>' ).addClass( control.iconClasses );

			$li.append( $icon );

			if ( control.menuDropDown ) {
				$dropdownUl = $( '<ul class="bg-editor-menu-dropdown"></ul>' );
				$dropdownUl.html('<li class="title">' + control.menuDropDown.title + '</li>');
				$.each( control.menuDropDown.options, function () {
					$dropdownUl.append( '<li class="' + this['class'] + '">' + this.name + '</li>' );
				} );
				$li.append( $dropdownUl );
			}

			if ( control.tooltip ) {
				$li.append( wp.template( 'boldgrid-editor-tooltip' )( {
					'message' : control.tooltip
				} ) );
			}

			this.$element.find( '> ul' ).append( $li );
		},


		/**
		 * Activate the passed control.
		 * 
		 * @since 1.2.7
		 * @param BG.Control control.
		 */
		activateControl : function ( control ) {
			self.deactivateControl();
			this.$activeElement = BOLDGRID.EDITOR.Menu.$element
				.find( '[data-action="menu-' + control.name + '"]')
				.addClass( 'active' );

		},

		/**
		 * Deactivate the active element.
		 * 
		 * @since 1.2.7
		 */
		deactivateControl : function () {
			if ( this.$activeElement ) {
				this.$activeElement.removeClass( 'active' );
				this.$activeElement = null;
			}
		},

		/**
		 * Reactivate Menu.
		 * 
		 * @since 1.2.7
		 */
		reactivateMenu : function () {
			var $panel = BOLDGRID.EDITOR.Panel.$element;
			if ( this.$activeElement && $panel.is( ':visible' ) ) {
				this.$element.find( '[data-action="menu-' + $panel.attr( 'data-type' ) + '"]' )
					.addClass( 'active' );
			}
		}

	};

	self = BOLDGRID.EDITOR.Menu;

} )( jQuery );