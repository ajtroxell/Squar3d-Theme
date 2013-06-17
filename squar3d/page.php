<?php get_header(); ?>
    <div class="inner-wrap">
      <section class="content page">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <div class="clear"></div>
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