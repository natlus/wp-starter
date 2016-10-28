<?php get_header(); ?>
<main class="main single" role="main">

    <div class="container">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<section class="post">

        <header class="posthead">
          <h2 class="title">
            <?php the_title(); ?>
          </h2>
          <small class="post-meta">
            <time class="date">
              <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
            </time>
            <div class="divider">•</div>
            <div class="categories">
              <?php the_category(', '); ?>
            </div>
          </small>
        </header>

				<article class="content" id="post-<?php the_ID(); ?>">
					<?php the_content(); ?>
				</article>

				<footer class="postfoot">
          <?php if ( has_tag() ) : ?>
					  <span class="tags"><?php the_tags('',' '); ?></span>
          <?php endif; ?>
				</footer>

			</section>

        <?php endwhile; endif; ?>

	</div>
</main>
<?php get_footer(); ?>
