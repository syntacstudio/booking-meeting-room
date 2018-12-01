require('./bootstrap');

// enable tooltip everywhere
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// stripe key
const stripeKey = $('meta[name=stripe]').attr('content');

// open upload file when edit room
$('input[name="edit_image"]').on('click', function(){
    if($(this).is(':checked')) {
        $('#image_upload').slideDown();
    } else {
        $('#image_upload').slideUp();
    }
});

// push field feedback
function pushFeedback(field, msg) {
	$('#'+field).addClass('is-invalid');
	$('#'+field+'-feedback').text(msg);
}

// clear field feedback
function clearFeedback() {
	$('.form-control').removeClass('is-invalid');
	$('.invalid-feedback strong').text('');
}

/**
 * Change total booking
 */
$('#booking-room #day').change(function(e){
	const day = $(this).val();
	const price = $('#price').data('price');
	$('#num-days').text(day);
	$('#total').text(parseInt(price) * parseInt(day));
});

/**
 * Checkout booking
 */
const booking_form = $('#booking-form');

booking_form.submit(function(e){
	e.preventDefault();

	clearFeedback();
	$('.loader').fadeIn();
	$.ajax({
		url: '/booking/validation',
		type: 'POST',
		dataType: 'JSON',
		data: booking_form.serialize()+'&permalink='+booking_form.data('room'),
	})
	.done(function($data) {
		if($data.errors){
			$.each($data.errors, function(field, msg) {
				pushFeedback(field, msg);
			});
		} else if($data.status == 'valid') {

			// stripe instance
			const checkout = StripeCheckout.configure({
			    key: stripeKey,
			    locale: 'auto',
			    token: function (token) {
					$('.loader').fadeIn();
			    	$.ajax({
			    		url: '/booking/store',
			    		type: 'POST',
			    		dataType: 'JSON',
			    		data: booking_form.serialize() + '&room='+ $data.room.id + '&stripeToken='+token.id
			    	})
			    	.done(function($data) {
			    		console.log($data);
			    	})
			    	.fail(function($data) {
			    		console.log($data);
			    	})
			    	.always(function() {
						$('.loader').fadeOut();
			    	});
			    	
			    }
			});

			// open instance
			checkout.open({
		        name: 'BizRoom',
		        description: 'Booking: '+$data.room.name,
		        email: $data.email,
		        amount: ($data.room.price * $('#booking-room #day').val())* 100
		    });
			$('.loader').fadeOut();
		}
	})
	.fail(function($data) {
		$('.loader').fadeOut();
		console.log($data);
	});
	
});

$('#print-invoice button').click(function(e){
	e.preventDefault();
	$(this).hide();
	window.print();
});