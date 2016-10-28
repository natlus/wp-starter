<?php

  /**
   *  Full width Row shortcode
   *
   *  [row color="white" image="http://example.com/bg.png"]
   *  Options:
   *  class - custom class
   *  color - custom text color within the shortcode
   *  background - custom background color for the row section
   *  image - custom background image for the row section
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
      $atts['color'] = 'background: url('. $atts['image'] .');';
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
   *  Column shortcode for grid layouts
   *
   *  [column]
   *  Options:
   *  size - percentage size in fractions, ie. 1/3 (33%)
   *  Default size will scale to fit
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
   *  Modal window shortcode
   *
   *  [modal id="modal-name" title="modal-title"]
   *  Options:
   *  id - required, unique name for the modal
   *  title - optional, title text at top of the modal
   *  width - optional, fixed width, default is auto with max container width
   */

  function modal_shortcode( $atts, $content = null ) {

    $defaults = array(
      'id' => '',
      'title' => '',
      'width' => '',
    );
    $atts = shortcode_atts( $defaults, $atts );

    ob_start();
      if ($atts['id']) {
        $output = ('
          <input class="modal-checkbox" type="checkbox" id="modal-' . $atts['id'] .'">
          <section class="modal" id="modal-' . $atts['id'] .'">
            <div class="modal-inner" style="width: '. $atts['width'] .'px">
              <label class="modal-close" for="modal-'. $atts['id'] .'">close</label>
              <header class="modal-header"><span class="modal-title">'. $atts['title'] .'</span></header>
              <div class="modal-body">'. do_shortcode($content) .'</div>
            </div>
          </section>
          <style>
          input[id*="modal-"]:checked ~ .modal#modal-'. $atts['id'] .' {
            transform: scale3d(1, 1, 1);
          }
          </style>
        ');
        echo $output;
      }

    return ob_get_clean();

  }
  add_shortcode('modal', 'modal_shortcode');

  /**
   *  Button shortcode
   *
   *  [button]
   *  Options:
   *  size - small, large, xlarge
   *  color - default, accent, primary, warning, danger
   *  style - outline or default
   *  class - custom class
   *  for - if set, button will become a label to trigger set modal window
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
    if ($atts['for']) {
      $type = 'label';
      $atts['for'] = ' for="modal-'. $atts['for'] .'"';
    } else {
      $type = 'span';
    }

    ob_start();

      $output = ('
        <'. $type . $atts['for'] .' role="button" class="btn'. $atts['size'] . $atts['color'] . $atts['type'] . $atts['class'] .'">'. do_shortcode($content) .'</'.$type.'>
      ');
      echo $output;

    return ob_get_clean();

  }
  add_shortcode('button', 'button_shortcode');

?>
