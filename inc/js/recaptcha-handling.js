jQuery(document).ready(function($) {
   jQuery('.invisible-recaptcha').on('click', function( event){
        event.preventDefault();
        var id = jQuery(this).attr('data-id');
        grecaptcha.ready(function () {
            grecaptcha.execute( wpec_recaptcha_object.client_side_key , { action: 'subscribe_newsletter' }).then(function (token) {
                $('.' + id).prepend('<input type="hidden" name="token" value="' + token + '">');
                $('.' + id).prepend('<input type="hidden" name="action" value="subscribe_newsletter">');
                $('.' + id).unbind('submit').submit();
            });;
        });
   });
});