require('./bootstrap');

// import swal2
const swal = require('sweetalert2');

// import fullcalendar
const fullcalendar = require('fullcalendar');

// enable tooltip everywhere
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
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
	$('.invalid-feedback').fadeIn();
}

// clear field feedback
function clearFeedback() {
	$('.form-control').removeClass('is-invalid');
	$('.invalid-feedback strong').text('');
	$('.invalid-feedback').fadeOut();
}

// clear alerts
function clearAlert(){
    $('.alert-action').remove();
}

// bookingConfirmed
function bookingConfirmed($data){
	const $html = '<div class="confirmation d-flex align-items-center mb-4 bg-white rounded border py-4 px-3">'+
            '<span class="icon">'+
                '<i class="fa fa-check-circle fa-5x mr-3 text-success"></i>'+
            '</span>'+
            '<span>'+
                '<p class="h5">Congratulations! Your meeting room booking is confirmed.</p>'+
                '<a href="/invoice/'+ $data.number +'" target="_blank" class="btn btn-sm btn-primary">View Invoice</a> or <a href="/browse">Book more meeting room.</a>'+
            '</span>'+
        '</div>'+
        '<p class="mt-3"><a href="/account"> Go to My Account</a></p>';
    $('#booking-form').remove();
    $('#booking-room .container').prepend($html);
}

//push alert
function pushAlert( type, msg, wrapper ) {
    var html = '<div class="alert alert-'+ type +' alert-dismissible fade show alert-action" role="alert"> '+ msg +' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
    $('.'+wrapper).prepend(html);
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
	clearAlert();
	$('.loader').fadeIn();
	$.ajax({
		url: '/booking/validation',
		type: 'POST',
		dataType: 'JSON',
		data: booking_form.serialize()+'&permalink='+booking_form.data('room'),
	})
	.done(function($data) {
		console.log($data);
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
		                if($data.errors) {
		                    $.each( $data.errors, function( key, msg ) {
		                    	pushAlert( 'danger', msg, 'booking-alert' );
		                    });
		                } else if($data.status == 'success') {
		                    bookingConfirmed($data.booking);
		                } else {
		                    pushAlert( 'danger', 'System error, please try again later or contact us.', 'booking-alert' );
		                }
			    	})
			    	.fail(function($data) {
			    		pushAlert( 'danger', 'System error, please try again later or contact us.', 'booking-alert' );
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
	}).
	always(function(){
		$('.loader').fadeOut();
	});
	
});

// print invoice
$('#print-invoice button').click(function(e){
	e.preventDefault();
	$(this).hide();
	window.print();
});

/**
 * Change profile
 */
const edit_profile = $('#edit-profile');

edit_profile.submit(function(e){
	e.preventDefault();

	$('.loader').fadeIn();
	clearFeedback();
	$.ajax({
		url: '/account/update',
		type: 'POST',
		dataType: 'JSON',
		data: edit_profile.serialize(),
	})
	.done(function($data) {
		if($data.errors){
			$.each($data.errors, function(field, msg) {
				pushFeedback(field, msg);
			});
		} else if($data.status == 'success'){
			swal({
			  title: 'Congratulation!',
			  text: $data.msg,
			  type: 'success',
			  showCancelButton: false,
			  confirmButtonColor: '#c61b1b'
			}).then((result) => {
				location.reload();
			})
		}
	})
	.fail(function() {
		swal('Oops!', 'Failed to update your profile.', 'error');
	})
	.always(function() {
		$('#editProfile').modal('toggle');
		$('.loader').fadeOut(50);
	});
});

// change password
const change_password = $('#change-password');

$('#start-change-password').click(function(e){
	$('#preview-password').hide();
	$('#change-password').show();
});

$('#cancel-pwd').click(function(e){
	clearFeedback();
	$('#change-password').hide();
	$('#preview-password').show();
});

change_password.submit(function(e){
	e.preventDefault();
	clearFeedback();
	$('.loader').fadeIn();

	$.ajax({
		url: '/account/update/password',
		type: 'POST',
		dataType: 'JSON',
		data: change_password.serialize(),
	})
	.done(function($data) {
		if($data.errors){
			$.each($data.errors, function(field, msg) {
				pushFeedback(field, msg);
			});
		} else if($data.status == 'success'){
			swal({
			  title: 'Congratulation!',
			  text: $data.msg,
			  type: 'success',
			  showCancelButton: false,
			  confirmButtonColor: '#c61b1b'
			}).then((result) => {
				$('#change-password').hide();
				$('#preview-password').show();
				change_password[0].reset();
			})
		}
	})
	.fail(function() {
		swal('Oops!', 'Failed to update your profile.', 'error');
	})
	.always(function() {
		$('.loader').fadeOut(50);
	});
	
});


