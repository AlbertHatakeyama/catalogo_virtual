(function( $ ) {
  $(function() {
    
    $(".IDformulario").validate({});

    $(".IDobrigatorio").each(function () {
        $(this).rules("add", { 
            required:true,
            messages: {
                /*required: "<span style='color:#ff0000;'>Campo obrigat�rio</span>"*/
                required: ""
            }
        });
    });

  });
})(jQuery);