(function($) {

  const body = document.querySelector('body');
  const queries = {
    'large': window.matchMedia('screen and (min-width: 1024px)'),
    'medium': window.matchMedia('screen and (max-width: 1024px)'),
    'small': window.matchMedia('screen and (max-width: 768px)'),
  };

  function largeScreen(mq) {
    if (mq.matches) {
      body.classList.add('full-size');
    } else {
      body.classList.remove('full-size');
    }
  }

  function mediumScreen(mq) {
    if (mq.matches) {
      body.classList.add('medium-size');
    } else {
      body.classList.remove('medium-size');
    }
  }

  function smallScreen(mq) {
    if (mq.matches) {
      body.classList.add('small-size');
    } else {
      body.classList.remove('small-size');
    }
  }

  queries.large.addListener(largeScreen);
  queries.medium.addListener(mediumScreen);
  queries.small.addListener(smallScreen);

  largeScreen(queries.large);
  mediumScreen(queries.medium);
  smallScreen(queries.small);

})(jQuery);
