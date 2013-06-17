<?php get_header(); ?>
    <div class="inner-wrap">
      <section class="content">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <article>
          <?php if(has_post_thumbnail()) :?>
          <?php else :?><?php endif;?>
            <h2><?php the_title(); ?></h2>
            <span class="meta"><?php the_time('F j, Y'); ?> // <a href="<?php the_permalink(); ?>#comments" title="<?php comments_number( '0 comments', '1 comment', '% comments' ); ?>"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></span>
            <?php if(has_post_thumbnail()) :?>
            <div class="img">
              <?php the_post_thumbnail(); ?>
            </div>
            <?php else :?><?php endif;?>
            <?php the_excerpt(); ?>
        </article>
        <?php endwhile; else: ?>
        <?php endif; ?>
        <div class="clear"></div>
      </section>
      <!--END POSTS-->
      <?php get_sidebar(); ?>
      <!--END SIDEBAR-->
      <div class="clear"></div>
    </div>
  </div>
  <!--END CONTENT-->
<?php get_footer(); ?>