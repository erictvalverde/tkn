jQuery(document).ready(function($) {
    // $() will work as an alias for jQuery() inside of this function

    $(".tkn_wrap .title").toggle(function() { 
              $(this).next('fieldset').fadeIn("500");
           },
           function() { 
              $(this).next('fieldset').fadeOut("500"); 
           });
           
});