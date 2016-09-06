(function($) {
  $(document).ready(() => {

    if ($('.jumbotron')) {
      $('.main').addClass('jumbopage');
    }

    // Add class to li.current-menu-item child <a>
    // for easier styling using a.current
    $('.current-menu-item > a').addClass('current');

  });
})(jQuery);
