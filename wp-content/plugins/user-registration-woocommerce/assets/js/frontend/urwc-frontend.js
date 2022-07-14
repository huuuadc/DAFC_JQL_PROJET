/* global wc_country_select_params */
jQuery( document ).ready( function ( $ ) {
	if( $('.field-separate_shipping #separate_shipping').length === '1') {

		var shipping_fields = [ 'shipping_country', 'shipping_first_name', 'shipping_last_name', 'shipping_company', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_state', 'shipping_postcode' ];
		if ( $('.field-separate_shipping #separate_shipping').attr('checked') === 'checked' ) {
		   $.each( shipping_fields, function( index, item ) {
			   $('#'+ item +'').parent().show();
			   $('.field-shipping_address_title').show();
		   });
		}
		else {
			$.each( shipping_fields, function( index, item ) {
			  $('#'+ item +'').parent().hide();
			  $('.field-shipping_address_title').hide();
		   });
		}

	   $( '.field-separate_shipping #separate_shipping' ).on( 'change', function () {

		   if( $( this ).attr('checked') === 'checked') {
			   $.each( shipping_fields, function( index, item ) {
					  $('#'+ item +'').parent().show();
				   $('.field-shipping_address_title').show();
			   });
		   }
		   else {
			   $.each( shipping_fields, function( index, item ) {
					  $('#'+ item +'').parent().hide();
				   $('.field-shipping_address_title').hide();
			   });
		   }
	   });
   }

	var date_selector = $( '.woocommerce  input[type="date"]' );

	if ( date_selector.length ) {
		date_selector.addClass( 'flatpickr-field' ).attr( 'type', 'text' ).flatpickr({
			disableMobile: true
		});
	}

	if( $( 'input[type="checkbox"]#createaccount' ).length ) {
		var $ur_fields = $( 'form.woocommerce-checkout' ).find( '.user-registration' );

		$( 'input[type="checkbox"]#createaccount' ).on( 'change', function () {
			if( $( this ).is( ':checked' ) ) {
				$ur_fields.slideDown( 1000 );
			} else {
				$ur_fields.hide();
			}
		});
	}

	/* State/Country select boxes */
    var states = $.parseJSON( wc_country_select_params.countries.replace( /&quot;/g, '"' ) );

	/**
	 * Update/Sync a state field with its relative country field.
	 *
	 * @param {JSON} options List of required params in `options`:
	 * - country_field_class : Classname of country field.
	 * - state_field_class   : Classname of state field.
	 * - state_input_id      : ID of state field's input element.
	 * - state_label         : Label for state field.
	 *
	 * @returns {Boolean} Whether successfully updated or not.
	 */
	function update_country_states( options ) {
		if (
			options.country_field_class && options.state_label &&
			options.state_field_class && options.state_input_id
		) {
			var $country_field = $( '.' + options.country_field_class ),
				$state_field = $( '.' + options.state_field_class ),
				selected_state = $state_field.find( 'select' ).val(),
				selected_country = $country_field.find( 'select' ).val(),
				current_states = states[ selected_country ],
				select_state_html = '<select id = "' + options.state_input_id + '" class="select ur-frontend-field" name="' + options.state_input_id + '"></select>',
				input_state_html = '<input data-id="' + options.state_input_id + '" type="text" class="input-text ur-frontend-field" name="' + options.state_input_id + '" id="' + options.state_input_id + '" data-label="' + options.state_label + '">';

			$state_field.find( 'select, input' ).remove();

			if ( ! Array.isArray( current_states ) ) {
				$state_field.append( select_state_html );

				$.each( current_states , function( key, val ) {
					$state_field.find( 'select' ).append( '<option value =' + key + '>' + val + '</option>' );
				});
			} else {
				$state_field.append( input_state_html );
			}

			if ( $state_field.find( 'select option[value="' + selected_state + '"]' ).length ) {
				$state_field.val( selected_state );
			}

			return true;
		}
		return false;
	}

	// Update billing address country/state.
	update_country_states({
		country_field_class: 'field-billing_country',
		state_field_class: 'field-billing_state',
		state_input_id: 'billing_state',
		state_label: 'State / Country'
	});

	// Update shipping address country/state.
	update_country_states({
		country_field_class: 'field-shipping_country',
		state_field_class: 'field-shipping_state',
		state_input_id: 'shipping_state',
		state_label: 'State / Country'
	});

	$( document.body ).on( 'change', '#billing_country', function () {
		// Update billing address country/state.
		update_country_states({
			country_field_class: 'field-billing_country',
			state_field_class: 'field-billing_state',
			state_input_id: 'billing_state',
			state_label: 'State / Country'
		});
	});
	$( document.body ).on( 'change', '#shipping_country', function () {
		// Update shipping address country/state.
		update_country_states({
			country_field_class: 'field-shipping_country',
			state_field_class: 'field-shipping_state',
			state_input_id: 'shipping_state',
			state_label: 'State / Country'
		});
	});
});