<?php get_header(); ?>
    <div class="inner-wrap">
      <section class="content">
        <?php query_posts( array( 'cat' => -279, 'paged' => get_query_var('paged') ) ); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <span class="meta"><?php the_time('F j, Y'); ?> // <?php $categories = get_the_category(); $seperator = ', '; $output = ''; if($categories){ foreach($categories as $category) { $output .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$seperator; } echo trim($output, $seperator); } ?> // <a href="<?php the_permalink(); ?>#comments" title="<?php comments_number( '0 comments', '1 comment', '% comments' ); ?>"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></span>
            <?php if(has_post_thumbnail()) :?>
            <div class="img">
              <?php the_post_thumbnail(); ?>
            </div>
            <?php else :?><?php endif;?>
            <?php the_excerpt(); ?>
        </article>
        <?php endwhile; else: ?>
        <?php endif; ?>
        <div class="navigation"><p><?php posts_nav_link('','&larr; Newer Posts','Older Posts &rarr;'); ?></p></div>
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