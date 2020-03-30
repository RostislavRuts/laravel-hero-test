(function ($) {
    console.log('FUCK js');

    $('#newimage').change(function (e) {
      let optionValue = ($('#newimage').val());
      $('#heroNewImg').attr('src', '/images/' + optionValue);p
    });
})(jQuery);



//'/etc/php/7.2/apache2/php.ini'




