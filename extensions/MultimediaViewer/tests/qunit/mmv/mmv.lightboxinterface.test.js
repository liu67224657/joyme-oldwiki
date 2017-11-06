( function ( mw, $ ) {
	var oldScrollTo;

	function stubScrollTo() {
		oldScrollTo = $.scrollTo;
		$.scrollTo = function () { return { scrollTop: $.noop, on: $.noop, off: $.noop }; };
	}

	function restoreScrollTo() {
		$.scrollTo = oldScrollTo;
	}

	QUnit.module( 'mmv.lightboxInterface', QUnit.newMwEnvironment() );

	QUnit.test( 'Sanity test, object creation and ui construction', 20, function ( assert ) {
		var lightbox = new mw.mmv.LightboxInterface();

		stubScrollTo();

		function checkIfUIAreasAttachedToDocument( inDocument ) {
			var msg = ( inDocument === 1 ? ' ' : ' not ' ) + 'attached.';
			assert.strictEqual( $( '.mw-mmv-wrapper' ).length, inDocument, 'Wrapper area' + msg );
			assert.strictEqual( $( '.mw-mmv-main' ).length, inDocument, 'Main area' + msg );
			assert.strictEqual( $( '.mw-mmv-title' ).length, inDocument, 'Title area' + msg );
			assert.strictEqual( $( '.mw-mmv-credit' ).length, inDocument, 'Author/source area' + msg );
			assert.strictEqual( $( '.mw-mmv-image-desc' ).length, inDocument, 'Description area' + msg );
			assert.strictEqual( $( '.mw-mmv-image-links' ).length, inDocument, 'Links area' + msg );
		}

		// UI areas not attached to the document yet.
		checkIfUIAreasAttachedToDocument( 0 );

		// Attach lightbox to testing fixture to avoid interference with other tests.
		lightbox.attach( '#qunit-fixture' );

		// UI areas should now be attached to the document.
		checkIfUIAreasAttachedToDocument( 1 );

		// Check that the close button on the lightbox still follow the spec (being visible right away)
		assert.strictEqual( $( '#qunit-fixture .mw-mmv-close' ).length, 1, 'There should be a close button' );
		assert.ok( $( '#qunit-fixture .mw-mmv-close' ).is( ':visible' ), 'The close button should be visible' );

		// Unattach lightbox from document
		lightbox.unattach();

		// UI areas not attached to the document anymore.
		checkIfUIAreasAttachedToDocument( 0 );

		restoreScrollTo();
	} );

	QUnit.test( 'Handler registration and clearance work OK', 2, function ( assert ) {
		var lightbox = new mw.mmv.LightboxInterface(),
			handlerCalls = 0;

		function handleEvent() {
			handlerCalls++;
		}

		lightbox.handleEvent( 'test', handleEvent );
		$( document ).trigger( 'test' );
		assert.strictEqual( handlerCalls, 1, 'The handler was called when we triggered the event.' );
		lightbox.clearEvents();
		$( document ).trigger( 'test' );
		assert.strictEqual( handlerCalls, 1, 'The handler was not called after calling lightbox.clearEvents().' );
	} );

	QUnit.test( 'Fullscreen mode', 8, function ( assert ) {
		var lightbox = new mw.mmv.LightboxInterface(),
			oldFnEnterFullscreen = $.fn.enterFullscreen,
			oldFnExitFullscreen = $.fn.exitFullscreen,
			oldSupportFullscreen = $.support.fullscreen;

		// Since we don't want these tests to really open fullscreen
		// which is subject to user security confirmation,
		// we use a mock that pretends regular jquery.fullscreen behavior happened
		$.fn.enterFullscreen = mw.mmv.testHelpers.enterFullscreenMock;
		$.fn.exitFullscreen = mw.mmv.testHelpers.exitFullscreenMock;

		stubScrollTo();

		lightbox.buttons.fadeOut = $.noop;

		// Attach lightbox to testing fixture to avoid interference with other tests.
		lightbox.attach( '#qunit-fixture' );

		$.support.fullscreen = false;
		lightbox.setupCanvasButtons();

		assert.strictEqual( lightbox.$fullscreenButton.css( 'display' ), 'none',
			'Fullscreen button is hidden when fullscreen mode is unavailable' );

		$.support.fullscreen = true;
		lightbox.setupCanvasButtons();

		assert.strictEqual( lightbox.$fullscreenButton.css( 'display' ), 'block',
			'Fullscreen button is visible when fullscreen mode is available' );

		// Entering fullscreen
		lightbox.$fullscreenButton.click();

		assert.strictEqual( lightbox.$main.hasClass( 'jq-fullscreened' ) , true,
			'Fullscreened area has the fullscreen class' );
		assert.strictEqual( lightbox.isFullscreen , true, 'Lightbox knows it\'s in fullscreen mode' );

		// Exiting fullscreen
		lightbox.$fullscreenButton.click();

		assert.strictEqual( lightbox.$main.hasClass( 'jq-fullscreened' ) , false,
			'Fullscreened area doesn\'t have the fullscreen class anymore' );
		assert.strictEqual( lightbox.isFullscreen , false, 'Lightbox knows it\'s not in fullscreen mode' );

		// Entering fullscreen
		lightbox.$fullscreenButton.click();

		// Hard-exiting fullscreen
		lightbox.$closeButton.click();

		// Re-attach after hard-exit
		lightbox.attach( '#qunit-fixture' );

		assert.strictEqual( lightbox.$main.hasClass( 'jq-fullscreened' ) , false,
			'Fullscreened area doesn\'t have the fullscreen class anymore' );
		assert.strictEqual( lightbox.isFullscreen , false, 'Lightbox knows it\'s not in fullscreen mode' );

		// Unattach lightbox from document
		lightbox.unattach();

		$.fn.enterFullscreen = oldFnEnterFullscreen;
		$.fn.exitFullscreen = oldFnExitFullscreen;
		$.support.fullscreen = oldSupportFullscreen;
		restoreScrollTo();
	} );

	QUnit.test( 'Fullscreen mode', 8, function ( assert ) {
		var buttonOffset, panelBottom,
			oldRevealButtonsAndFadeIfNeeded,
			lightbox = new mw.mmv.LightboxInterface(),
			viewer = new mw.mmv.MultimediaViewer( { get: $.noop } ),
			oldFnEnterFullscreen = $.fn.enterFullscreen,
			oldFnExitFullscreen = $.fn.exitFullscreen;

		stubScrollTo();

		// ugly hack to avoid preloading which would require lightbox list being set up
		viewer.preloadDistance = -1;

		// Since we don't want these tests to really open fullscreen
		// which is subject to user security confirmation,
		// we use a mock that pretends regular jquery.fullscreen behavior happened
		$.fn.enterFullscreen = mw.mmv.testHelpers.enterFullscreenMock;
		$.fn.exitFullscreen = mw.mmv.testHelpers.exitFullscreenMock;

		// Attach lightbox to testing fixture to avoid interference with other tests.
		lightbox.attach( '#qunit-fixture' );
		viewer.ui = lightbox;
		viewer.ui = lightbox;

		assert.ok( !lightbox.isFullscreen, 'Lightbox knows that it\'s not in fullscreen mode' );
		assert.ok( lightbox.panel.$imageMetadata.is( ':visible' ), 'Image metadata is visible' );

		lightbox.buttons.fadeOut = function () {
			assert.ok( true, 'Opening fullscreen triggers a fadeout' );
		};

		// Pretend that the mouse cursor is on top of the button
		buttonOffset = lightbox.buttons.$fullscreen.offset();
		lightbox.mousePosition = { x: buttonOffset.left, y: buttonOffset.top };

		// Enter fullscreen
		lightbox.buttons.$fullscreen.click();

		lightbox.buttons.fadeOut = $.noop;
		assert.ok( lightbox.isFullscreen, 'Lightbox knows that it\'s in fullscreen mode' );

		oldRevealButtonsAndFadeIfNeeded = lightbox.buttons.revealAndFade;

		lightbox.buttons.revealAndFade = function ( position ) {
			assert.ok( true, 'Moving the cursor triggers a reveal + fade' );

			oldRevealButtonsAndFadeIfNeeded.call( this, position );
		};

		// Pretend that the mouse cursor moved to the top-left corner
		lightbox.mousemove( { pageX: 0, pageY: 0 } );

		lightbox.buttons.revealAndFadeIfNeeded = $.noop;

		panelBottom = $( '.mw-mmv-post-image' ).position().top + $( '.mw-mmv-post-image' ).height();

		assert.ok( panelBottom === $( window ).height(), 'Image metadata does not extend beyond the viewport' );

		// Exiting fullscreen
		lightbox.buttons.$fullscreen.click();

		panelBottom = $( '.mw-mmv-post-image' ).position().top + $( '.mw-mmv-post-image' ).height();

		assert.ok( panelBottom > $( window ).height(), 'Image metadata extends beyond the viewport' );
		assert.ok( !lightbox.isFullscreen, 'Lightbox knows that it\'s not in fullscreen mode' );

		// Unattach lightbox from document
		lightbox.unattach();

		$.fn.enterFullscreen = oldFnEnterFullscreen;
		$.fn.exitFullscreen = oldFnExitFullscreen;
		restoreScrollTo();
	} );

	QUnit.test( 'isAnyActiveButtonHovered', 35, function ( assert ) {
		var lightbox = new mw.mmv.LightboxInterface();

		stubScrollTo();

		// Attach lightbox to testing fixture to avoid interference with other tests.
		lightbox.attach( '#qunit-fixture' );

		$.each ( lightbox.buttons.$buttons, function ( idx, e ) {
			var $e = $( e ),
				offset = $e.show().offset(),
				width = $e.width(),
				height = $e.height(),
				disabled = $e.hasClass( 'disabled' );

			assert.strictEqual( lightbox.buttons.isAnyActiveButtonHovered( offset.left, offset.top ),
				!disabled,
				'Hover detection works for top-left corner of element' );
			assert.strictEqual( lightbox.buttons.isAnyActiveButtonHovered( offset.left + width, offset.top ),
				!disabled,
				'Hover detection works for top-right corner of element' );
			assert.strictEqual( lightbox.buttons.isAnyActiveButtonHovered( offset.left, offset.top + height ),
				!disabled,
				'Hover detection works for bottom-left corner of element' );
			assert.strictEqual( lightbox.buttons.isAnyActiveButtonHovered( offset.left + width, offset.top + height ),
				!disabled,
				'Hover detection works for bottom-right corner of element' );
			assert.strictEqual( lightbox.buttons.isAnyActiveButtonHovered(
				offset.left + ( width / 2 ), offset.top + ( height / 2 ) ),
				!disabled,
				'Hover detection works for center of element' );
		} );

		// Unattach lightbox from document
		lightbox.unattach();
		restoreScrollTo();
	} );

	QUnit.test( 'Keyboard prev/next', 2, function ( assert ) {
		var viewer = new mw.mmv.MultimediaViewer( { get: $.noop } ),
			lightbox = new mw.mmv.LightboxInterface();

		viewer.setupEventHandlers();

		// Since we define both, the test works regardless of RTL settings
		viewer.nextImage = function () {
			assert.ok( true, 'Next image was open' );
		};

		viewer.prevImage = function () {
			assert.ok( true, 'Prev image was open' );
		};

		// 37 is left arrow, 39 is right arrow
		lightbox.keydown( $.Event( 'keydown', { which: 37 } ) );
		lightbox.keydown( $.Event( 'keydown', { which: 39 } ) );

		viewer.nextImage = function () {
			assert.ok( false, 'Next image should not have been open' );
		};

		viewer.prevImage = function () {
			assert.ok( false, 'Prev image should not have been open' );
		};

		lightbox.keydown( $.Event( 'keydown', { which: 37, altKey: true } ) );
		lightbox.keydown( $.Event( 'keydown', { which: 39, altKey: true } ) );
		lightbox.keydown( $.Event( 'keydown', { which: 37, ctrlKey: true } ) );
		lightbox.keydown( $.Event( 'keydown', { which: 39, ctrlKey: true } ) );
		lightbox.keydown( $.Event( 'keydown', { which: 37, shiftKey: true } ) );
		lightbox.keydown( $.Event( 'keydown', { which: 39, shiftKey: true } ) );
		lightbox.keydown( $.Event( 'keydown', { which: 37, metaKey: true } ) );
		lightbox.keydown( $.Event( 'keydown', { which: 39, metaKey: true } ) );

		viewer.cleanupEventHandlers();
	} );
}( mediaWiki, jQuery ) );