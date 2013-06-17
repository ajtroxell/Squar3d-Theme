<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <title>
    <?php if (function_exists('is_tag') && is_tag()) { echo 'Tag Archive for &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Archive - '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; } elseif (is_404()) { echo 'Not Found - '; } if (is_home()) { bloginfo('name'); echo ' - '; bloginfo('description'); } else { bloginfo('name'); } ?>
  </title>

  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.min.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">

  <!-- Google Font -->
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/ie.css">
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/images/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/images/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/images/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/images/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/images/favicon.png">

  <!-- Wordpress Header Scripts -->
  <?php wp_enqueue_script("jquery"); ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
    <?php wp_head(); ?>

  <!-- Facebook Meta Values -->
    <?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
    <!-- the default values -->
      <meta property="fb:app_id" content="159922550725023" />
      <meta property="fb:admins" content="100001254773917" />
    <!-- if page is content page -->
    <?php if (is_single()) { ?>
      <meta property="og:url" content="<?php the_permalink() ?>"/>
      <meta property="og:title" content="<?php single_post_title(''); ?>" />
      <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
      <meta property="og:type" content="article" />
      <meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />
    <!-- if page is others -->
    <?php } else { ?>
      <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
      <meta property="og:description" content="<?php bloginfo('description'); ?>" />
      <meta property="og:type" content="website" />
      <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/images/apple-touch-icon-144-precomposed.png" />
    <?php } ?>

    <!-- Wordpress XML -->
    <link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php echo site_url(); ?>/feed/" />

</head>

<body>
<div class="header-wrap">
  <div class="search">
    <form role="search" method="get" action="<?php echo site_url(); ?>/">
      <input type="text" name="s" id="s" class="header-search" value="search...">
      <input type="submit" value="Search">
    </form>
  </div>
</div>
<div class="clear"></div>
<div class="body-wrap">
  <div class="row">
    <header>
      <div class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/css/images/logo.png" alt="" />
        <?php if ( is_home() || is_front_page() ) { ?>
          <h1><?php bloginfo('name'); ?></h1>
        <?php } else { ?>
        <h2><?php bloginfo('name'); ?></h2>
        <?php } ?>
      </div>
      <nav class="primary-nav">
        <?php wp_nav_menu( array( 'theme_location' => 'header-nav' ) ); ?>
      </nav>
    </header>
  </div>
  <div class="row">