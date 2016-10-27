<footer class="mastfoot" role="footer">

  <section class="row">
    <div class="container">
      <div class="columns">
        <?php if (is_active_sidebar('footer-columns')) : dynamic_sidebar('footer-columns'); endif; ?>
      </div>
    </div>
  </section>

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
