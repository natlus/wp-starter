(function($) {

  const icon = $('.show-resp-menu');
  const body = $('body');
  const checkbox = $('input#show-resp-menu');

  /**
   * Manipulate body and menu icon when menu is shown/hidden
   * .close will change to a close icon
   * .no-scroll will disable scrolling
  */

  $(document).ready(() => {
    if (icon && body.hasClass('small-size')) {
      if (checkbox.is(':checked')) {
        icon.addClass('close');
        body.addClass('no-scroll');
      } else {
        icon.removeClass('close');
        body.removeClass('no-scroll');
      }

      checkbox.on('change', () => {
        if (checkbox.is(':checked')) {
          icon.addClass('close');
          body.addClass('no-scroll');
        } else {
          icon.removeClass('close');
          body.removeClass('no-scroll');
        }
      });
    }
  });

})(jQuery);
