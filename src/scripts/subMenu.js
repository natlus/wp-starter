(function($) {

  $(document).ready(() => {

    const subMenu = $('.sub-menu');

    /*
    ** Fix half pixel bug on sub menus
    ** caused by css transforms using % values
    */
    const height = subMenu.outerHeight();
    const width = subMenu.outerWidth();
    if (height & 1) {
      subMenu.outerHeight(height + 1);
    }
    if (width & 1) {
      subMenu.outerWidth(width + 1);
    }

    /*
    **  Add a show/hide toggle for sub menus
    **
    */

    $('.menu-item-has-children').append('<span class="toggle-sub-menu"></span>')

    $('.toggle-sub-menu').click((e) => {
      $(e.currentTarget).parent().children('ul.sub-menu').toggleClass('is-open');
    });

  });
})(jQuery);
