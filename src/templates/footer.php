<footer class="mastfoot" role="footer">

  <div class="container">
    <div class="columns">
      <div class="column one-fifth">
        <?php if (is_active_sidebar('footer-col-1')) : dynamic_sidebar('footer-col-1'); endif; ?>
      </div>
      <div class="column one-fifth">
        <?php if (is_active_sidebar('footer-col-2')) : dynamic_sidebar('footer-col-2'); endif; ?>
      </div>
      <div class="column one-fifth">
        <?php if (is_active_sidebar('footer-col-3')) : dynamic_sidebar('footer-col-3'); endif; ?>
      </div>
      <div class="column two-fifths">
        <?php if (is_active_sidebar('footer-col-4')) : dynamic_sidebar('footer-col-4'); endif; ?>
      </div>
    </div>
  </div>

  <section class="mastfoot-bottom">
    <div class="container bottom">
      <div class="legal">
        <span class="copyright">
          <?php if (get_option('custom_footer_text')) : ?>
            <?php echo get_option('custom_footer_text') ?>
          <?php endif; ?>
        </span>
        <nav class="mastfoot-legal-nav">
          <?php wp_nav_menu( array( 'theme_location' => 'footer-legal-menu', 'before' => '', 'fallback_cb' => false ) ); ?>
        </nav>
      </div>
      <div class="social">
        <?php if (is_active_sidebar('footer-social')) : dynamic_sidebar('footer-social'); endif; ?>
      </div>
    </div>
    </div>

</footer>
<?php wp_footer(); ?>
</body>
</html>
