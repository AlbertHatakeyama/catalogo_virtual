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
    $('.money').mask('#.##0,00', {reverse: true});

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