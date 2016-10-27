(function($) {

  $(document).ready(() => {

    const subMenu = $('.sub-menu');

    /**
     * Fix half pixel bug on sub menus
     * caused by css transforms using % values
     */

    const height = subMenu.outerHeight();
    const width = subMenu.outerWidth();

    if (height & 1) {
      subMenu.outerHeight(parseInt(height + 1, 10));
    }
    if (width & 1) {
      subMenu.outerWidth(parseInt(width + 1, 10));
    }

    /**
     * Add a show/hide toggle for sub menus
     *
     */

    $('.menu-item-has-children').append('<span class="toggle-sub-menu"></span>')

    $('.toggle-sub-menu').on('click', (e) => {

      // Sub-menu offset from viewport top
      const top = e.target.parentNode.getBoundingClientRect().top;

      $(e.currentTarget).parent().parent().toggleClass('sub-menu-is-open');
      $(e.currentTarget).parent().toggleClass('sub-menu-is-open');
      $(e.currentTarget).parent().children('ul.sub-menu').toggleClass('is-open').css('top', 70 - top);
      $(e.currentTarget).toggleClass('is-open');

    });

  });
})(jQuery);
