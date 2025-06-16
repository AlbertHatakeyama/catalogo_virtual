(function( $ ) {
  $(function() {
    $('.data').mask('00/00/0000', {clearIfNotMatch: true});
    $('.data_time').mask('00/00/0000 00:00:00', {clearIfNotMatch: true});
    $('.dia_mes').mask('00/00', {clearIfNotMatch: true});
    $('.mes_ano').mask('00/0000', {clearIfNotMatch: true});
    $('.horario').mask('00:00:00', {clearIfNotMatch: true});
    $('.hora_minuto').mask('00:00', {clearIfNotMatch: true});
    $('.cnpj').mask('00.000.000/0000-00', {clearIfNotMatch: true});
    $('.cpf').mask('000.000.000-00', {clearIfNotMatch: true});
    $('.cep').mask('00000-000', {clearIfNotMatch: true});
    /*$('.money').mask('#.##0,00', {reverse: true});*/
     $('.money').mask('000.000.000.000.000,00', {reverse: true});

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.telefone, .celular').mask(SPMaskBehavior, spOptions);

  });
})(jQuery);


/*$(document).ready(function(){
    
    jQuery(function ($) {   
        $(".celular").mask("(99)99999-9999", {placeholder: "  "});
        $(".telefone").mask("(99)9999-9999", {placeholder: "  "});
        $(".data").mask("(99/99/9999", {placeholder: "  "});
        $(".dia_mes").mask("99/99", {placeholder: "  "});
        $(".mes_ano").mask("99/9999", {placeholder: "  "});
        $(".horario").mask("99:99:99", {placeholder: "  "});
        $(".hora_minuto").mask("99:99", {placeholder: "  "});
        $(".cnpj").mask("99.999.999/9999-99", {placeholder: "  "});
        $(".cpf").mask("999.999.999-99", {placeholder: "  "});
        $(".cep").mask("99999-999", {placeholder: "  "});
    });
});*/