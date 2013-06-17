<?php get_header(); ?>
    <div class="inner-wrap">
      <section class="content single">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <article>
          <div class="post">
            <h1><?php the_title(); ?></h1>
            <span class="meta"><?php the_time('F j, Y'); ?> // <?php $categories = get_the_category(); $seperator = ', '; $output = ''; if($categories){ foreach($categories as $category) { $output .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$seperator; } echo trim($output, $seperator); } ?></span>
            <?php the_content(); ?>
          </div>
          <div class="clear"></div>
          <a class="button hide-show">Show Comments</a>
          <article id="comments" class="comments">
          <?php comments_template('', true); ?>
          </article>
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