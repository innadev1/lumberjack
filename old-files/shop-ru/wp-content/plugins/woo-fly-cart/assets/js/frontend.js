jQuery( document ).ready( function() {

	// Reload the cart
	if ( woofcVars.reload == 'yes' ) {
		woofc_get_cart();
	}

	// Perfect scrollbar
	woofc_perfect_scrollbar();

	// Qty minus
	jQuery( 'body' ).on( 'click', '#woofc-area .woofc-item-qty-minus', function() {
		var qtyMin = 1;
		var step = 1;
		var qtyInput = jQuery( this ).parent().find( 'input.qty' );
		var qty = Number( qtyInput.val() );
		if ( (
			     qtyInput.attr( 'min' ) != ''
		     ) && (
			     qtyInput.attr( 'min' ) != null
		     ) ) {
			qtyMin = Number( qtyInput.attr( 'min' ) );
		}
		if ( qtyInput.attr( 'step' ) != '' ) {
			step = Number( qtyInput.attr( 'step' ) );
		}
		var qtyStep = qtyMin + step;
		if ( qty >= qtyStep ) {
			qtyInput.val( qty - step );
		}
		qtyInput.trigger( 'change' );
	} );

	// Qty plus
	jQuery( 'body' ).on( 'click', '#woofc-area .woofc-item-qty-plus', function() {
		var qtyMax = 1000;
		var step = 1;
		var qtyInput = jQuery( this ).parent().find( 'input.qty' );
		var qty = Number( qtyInput.val() );
		if ( (
			     qtyInput.attr( 'max' ) != ''
		     ) && (
			     qtyInput.attr( 'max' ) != null
		     ) ) {
			qtyMax = Number( qtyInput.attr( 'max' ) );
		}
		if ( qtyInput.attr( 'step' ) != '' ) {
			step = Number( qtyInput.attr( 'step' ) );
		}
		var qtyStep = qty + step;
		if ( qtyMax >= qtyStep ) {
			qtyInput.val( qtyStep );
		}
		qtyInput.trigger( 'change' );
	} );

	// Qty on change
	jQuery( 'body' ).on( 'change', '#woofc-area input.qty', function() {
		var item_key = jQuery( this ).attr( 'name' );
		var item_qty = jQuery( this ).val();
		woofc_update_qty( item_key, item_qty );
	} );

	// Qty validate
	var t = false;
	jQuery( 'body' ).on( 'focus', '#woofc-area input.qty', function() {
		var thisQty = jQuery( this );
		var thisQtyMin = thisQty.attr( 'min' );
		var thisQtyMax = thisQty.attr( 'max' );
		if ( (
			     thisQtyMin == null
		     ) || (
			     thisQtyMin == ''
		     ) ) {
			thisQtyMin = 1;
		}
		if ( (
			     thisQtyMax == null
		     ) || (
			     thisQtyMax == ''
		     ) ) {
			thisQtyMax = 1000;
		}
		t = setInterval(
			function() {
				if ( (
					     thisQty.val() < thisQtyMin
				     ) || (
					     thisQty.val().length == 0
				     ) ) {
					thisQty.val( thisQtyMin )
				}
				if ( thisQty.val() > thisQtyMax ) {
					thisQty.val( thisQtyMax )
				}
			}, 50 )
	} );

	jQuery( 'body' ).on( 'blur', '#woofc-area input.qty', function() {
		if ( t != false ) {
			window.clearInterval( t )
			t = false;
		}
		var item_key = jQuery( this ).attr( 'name' );
		var item_qty = jQuery( this ).val();
		woofc_update_qty( item_key, item_qty );
	} );

	// Remove item
	jQuery( 'body' ).on( 'click', '#woofc-area .woofc-item-remove', function() {
		jQuery( this ).closest( '.woofc-item' ).addClass( 'woofc-item-removing' );
		var item_key = jQuery( this ).attr( 'data-key' );
		woofc_remove_item( item_key );
		jQuery( this ).closest( '.woofc-item' ).slideUp();
	} );

	jQuery( 'body' ).on( 'click tap', '.woofc-overlay', function() {
		woofc_hide_cart();
	} );

	jQuery( 'body' ).on( 'click tap', '.woofc-close', function() {
		woofc_hide_cart();
	} );

	jQuery( 'body' ).on( 'click tap', '#woofc-continue', function() {
		woofc_hide_cart();
	} );

	// Auto show
	if ( woofcVars.auto_show == 'yes' ) {
		jQuery( 'body' ).on( 'added_to_cart', function() {
			woofc_get_cart();
			woofc_show_cart();
		} );
	} else {
		jQuery( 'body' ).on( 'added_to_cart', function() {
			woofc_get_cart();
		} );
	}

	// Manual show
	if ( woofcVars.manual_show != '' ) {
		jQuery( 'body' ).on( 'click', woofcVars.manual_show, function() {
			woofc_show_cart();
		} );
	}
} );

function woofc_update_qty( cart_item_key, cart_item_qty ) {
	var data = {
		action: 'woofc_update_qty',
		cart_item_key: cart_item_key,
		cart_item_qty: cart_item_qty,
		nonce: jQuery( '#woofc-nonce' ).val(),
		security: woofcVars.nonce
	};
	jQuery.post( woofcVars.ajaxurl, data, function( response ) {
		var cart_response = JSON.parse( response );
		jQuery( '#woofc-subtotal' ).html( cart_response['subtotal'] );
	} );
}

function woofc_remove_item( cart_item_key ) {
	var data = {
		action: 'woofc_remove_item',
		cart_item_key: cart_item_key,
		nonce: jQuery( '#woofc-nonce' ).val(),
		security: woofcVars.nonce
	};
	jQuery.post( woofcVars.ajaxurl, data, function( response ) {
		var cart_response = JSON.parse( response );
		jQuery( '#woofc-subtotal' ).html( cart_response['subtotal'] );
	} );
}

function woofc_get_cart() {
	jQuery( '#woofc-area' ).addClass( 'woofc-area-loading' );
	var data = {
		action: 'woofc_get_cart',
		nonce: jQuery( '#woofc-nonce' ).val(),
		security: woofcVars.nonce
	};
	jQuery.post( woofcVars.ajaxurl, data, function( response ) {
		var cart_response = JSON.parse( response );
		jQuery( '#woofc-area' ).html( cart_response['html'] );
		woofc_perfect_scrollbar();
		jQuery( '#woofc-area' ).removeClass( 'woofc-area-loading' );
	} );
}

function woofc_perfect_scrollbar() {
	jQuery( '#woofc-area .woofc-area-mid' ).perfectScrollbar( {suppressScrollX: true, theme: 'woofc'} );
}

function woofc_show_cart() {
	jQuery( 'body' ).addClass( 'woofc-body-show' );
	jQuery( '#woofc-area' ).addClass( 'woofc-area-show' );
}

function woofc_hide_cart() {
	jQuery( '#woofc-area' ).removeClass( 'woofc-area-show' );
	jQuery( 'body' ).removeClass( 'woofc-body-show' );
}