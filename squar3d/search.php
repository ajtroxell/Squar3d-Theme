<?php get_header(); ?>
    <div class="inner-wrap">
      <section class="content">
        <article>
            <h1>Search Results for "<em><?php the_search_query() ?></em>"</h1>
            <dl>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <dt><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></dt>
              <dd><?php $myExcerpt = get_the_excerpt(); $tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt); echo $myExcerpt; ?></dd>
              <?php endwhile; else: ?>
              <dd><?php _e("Sorry, there wasn't any content matching your search."); ?></dd>
              <?php endif; ?>
            </dl>
            <div class="clear"></div>
        </article>
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