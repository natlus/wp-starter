<?php get_header(); ?>
<main class="main blog" role="main">

  <?php get_sidebar(); ?>
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <section class="post">

        <header class="posthead">
          <h2 class="title">
            <a href="<?php the_permalink() ?>">
              <?php the_title(); ?>
            </a>
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
          <?php the_content(''); ?>
        </article>

        <footer class="postfoot">
          <?php if ( has_tag() ) : ?>
            <span class="tooltip tooltip-right" aria-label="Tags">
              <span class="tags"><?php the_tags('',' '); ?></span>
            </span>
          <?php endif; ?>
          <?php if ( strpos( $post->post_content , "<!--more-->" ) != false ) : ?>
            <span class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></span>
            <?php endif; ?>
        </footer>

      </section>

      <?php endwhile; endif; ?>

      <?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="pagination btn-group">
          <?php
          $pagination = paginate_links(
            array(
              'type' => 'array',
              'next_text' => ' ',
              'prev_text' => ' ',
            )
          );

          foreach ($pagination as $n) {
            echo '<span class="btn btn-small">' . $n . '</span>';
          }


          ?>
        </nav>
      <?php endif; ?>

  </div>
</main>
  <?php get_footer(); ?>
