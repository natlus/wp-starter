<?php
/*
 * Template Name: Frontpage
 */
?>

<?php get_header(); ?>

<main class="main frontpage" role="main">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
	<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
