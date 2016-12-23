<?php

  /**
   * Full width Row shortcode
   * [row]
   *
   * Options
   * class: custom html class
   * color: color for text inside the shortcode
   * background: background color for the section
   * image: background image for the section
   */

  function row_shortcode( $atts, $content = null ) {

    $defaults = array(
      'class' => '',
      'background' => '',
      'color' => '',
      'image' => '',
    );
    $atts = shortcode_atts( $defaults, $atts );

    if ($atts['class']) {
      $atts['class'] = ' ' . $atts['class'];
    }
    if ($atts['color']) {
      $atts['color'] = 'color: '. $atts['color'] .';';
    }
    if ($atts['background']) {
      $atts['background'] = 'background: '. $atts['background'] .';';
    }
    if ($atts['image']) {
      $atts['image'] = 'background: url('. $atts['image'] .');';
    }

    ob_start();

      $output = ('

        <section class="row'.$atts['class'].'" style="'. $atts['color'] . $atts['background'] . $atts['image'] .'">
          <div class="container">
            <div class="columns'.$atts['class'].'">
              '. do_shortcode($content) .'
            </div>
          </div>
        </section>

      ');

      echo $output;

    return ob_get_clean();
  }
  add_shortcode( 'row', 'row_shortcode' );

  /**
   * Column shortcode for grid layouts
   * [column]
   *
   * Options
   * class: custom html class
   * size: size of the column in fractions (ie 1/2, 1/3)
   * Default size will scale to fit.
   */

  function grid_shortcode( $atts, $content = null ) {

    $defaults = array(
      'size' => '',
      'class' => '',
    );
    $atts = shortcode_atts( $defaults, $atts );

    if ($atts['class']) {
      $atts['class'] = ' ' . $atts['class'];
    }

    switch ($atts['size']) {
      case '1':
        $class = ' one-full';
        break;
      case '1/2':
        $class = ' one-half';
        break;
      case '1/3':
        $class = ' one-third';
        break;
      case '2/3':
        $class = ' two-thirds';
        break;
      case '1/4':
        $class = ' one-fourth';
        break;
      case '3/4':
        $class = ' three-fourths';
        break;
      case '1/5':
        $class = ' one-fifth';
        break;
      case '2/5':
        $class = ' two-fifths';
        break;
      case '3/5':
        $class = ' three-fifths';
        break;
      case '4/5':
        $class = ' four-fifths';
        break;
      case '1/6':
        $class = ' one-sixth';
        break;
      case '5/6':
        $class = ' five-sixths';
        break;
      default:
        $class = '';
    }

    ob_start();

      $output = ('

        <div class="column'.$class . $atts['class'].'">
          '. do_shortcode($content) .'
        </div>

      ');

      echo $output;

    return ob_get_clean();
  }
  add_shortcode( 'column', 'grid_shortcode' );

  /**
   * Button shortcode
   * [button]
   *
   * Options
   * class: custom html class
   * size: button size (small, large, xlarge)
   * color: color of the button (default, brand, accent, primary, warning, danger)
   * style: style of the button (outline or default)
   */

  function button_shortcode($atts, $content = null) {

    $defaults = array(
      'size' => '',
      'color' => '',
      'type' => '',
      'class' => '',
      'for' => '',
    );
    $atts = shortcode_atts($defaults, $atts);

    if ($atts['size']) {
      $atts['size'] = ' btn-' . $atts['size'];
    }
    if ($atts['color']) {
      $atts['color'] = ' btn-' . $atts['color'];
    }
    if ($atts['type']) {
      $atts['type'] = ' btn-' . $atts['type'];
    }
    if ($atts['class']) {
      $atts['class'] = ' ' . $atts['class'];
    }

    ob_start();

      $output = ('
        <span role="button" class="btn'. $atts['size'] . $atts['color'] . $atts['type'] . $atts['class'] .'">
          '.do_shortcode($content).'
        </span>
      ');
      echo $output;

    return ob_get_clean();

  }
  add_shortcode('button', 'button_shortcode');

?>
