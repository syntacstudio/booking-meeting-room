require('./bootstrap');

// open upload file when edit room
$('input[name="edit_image"]').on('click', function(){
    if($(this).is(':checked')) {
        $('#image_upload').slideDown();
    } else {
        $('#image_upload').slideUp();
    }
});