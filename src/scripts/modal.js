(function($) {
  $(document).ready(() => {

    const modal = $('.modal-inner');
    const checkbox = $('input.modal-checkbox');
    const body = $('body');

    /*
    **  Force modal height and width to always be an even number
    **  Fix for the "webkit half-pixel transform bug"
    **  Where odd dimensions get transformed half a pixel, causing blur
    **
    **  Using AND bitwise operator to check if modal width/height is odd
    **  and append 1px accordingly
    **/

    const height = modal.outerHeight();
    const width = modal.outerWidth();

    if (height & 1) {
      modal.outerHeight(height + 1);
    }
    if (width & 1) {
      modal.outerWidth(width + 1);
    }


    // Close all modals with ESC
    $(document).on('keydown', (e) => {
      if (e.keyCode === 27) {
        checkbox.prop('checked', false);
      }
    });

    // Close all modals when clicking outside a modal window
    $('section.modal').on('click', (e) => {
      if (!e.target.offsetParent || !e.target.offsetParent.className.match(/modal/)) {
        checkbox.prop('checked', false);
      }
    });

  });
})(jQuery);
