<?php get_header(); ?>
<main class="main not-found" role="main">
    <div class="container">
      <h1>404</h1>
      <h2>Page Not Found</h2>
      <nav>
        <a href="javascript:history.go(-1)">Back</a>
        <a href="<?php echo get_settings('home'); ?>">Home</a>
      </nav>
    </div>
</main>
<?php get_footer(); ?>
