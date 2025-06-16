(function( $ ) {
  $(function() {
    
    $(".IDformulario").validate({});

    $(".IDobrigatorio").each(function () {
        $(this).rules("add", { 
            required:true,
            messages: {
                /*required: "<span style='color:#ff0000;'>Campo obrigatório</span>"*/
                required: ""
            }
        });
    });

  });
})(jQuery);