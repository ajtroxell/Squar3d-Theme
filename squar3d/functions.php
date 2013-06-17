<?php

/*
 * REGISTER SIDEBAR
 */
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<div class="callout">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

/**
 * MENUS
 */
add_action( 'init', 'my_custom_menus' );
function my_custom_menus() {
	register_nav_menus(
		array(
			'header-nav' => __( 'Header Nav' ),
			'footer-social' => __( 'Footer Social Icons' )
		)
	);
}

/**
 * POST THUMBNAILS
 */
add_theme_support('post-thumbnails');
set_post_thumbnail_size(644, 125, true);

/**
 * EXCERPT
 */
function replace_excerpt($content) {
	return str_replace('[...]',
		'<a href="'. get_permalink() .'">...</a>',
		$content
	);
}
add_filter('the_excerpt', 'replace_excerpt');

/**
 * REMOVE CAPTION LINE STYLING
 */
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
	// New-style shortcode with the caption inside the shortcode with the link and image tags.
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}

	// Allow plugins/themes to override the default caption template.
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px">'
	. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
?>
<?php
/**
 * COMMENTS
 */
function white_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>">

		<div class="avatar">
			<?php echo get_avatar($comment,$size='66' ); ?>
		</div>

		<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
		<?php endif; ?>

		<?php comment_text() ?>

		<div class="comment-meta">
			<div class="info vcard">
				<?php printf(__('<cite class="fn">%s</cite>, '), get_comment_author_link()) ?>
				<?php printf(__('%1$s at %2$s'), get_comment_date(),get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),' ','') ?>
			</div>
			<?php if($args['max_depth']!=$depth) { ?>
			<div class="reply">
				<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		<?php } ?>
		</div>
		<div class="clear"></div>
	</div>
<?php } ?>
<?php
/**
 * TRACKBACKS AND PINGS
 */
function white_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>">

		<?php comment_text() ?>

		<div class="comment-meta">
			<div class="info vcard">
				<?php printf(__('<cite class="fn">%s</cite>, '), get_comment_author_link()) ?>
				<?php printf(__('%1$s at %2$s'), get_comment_date(),get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),' ','') ?>
				<div class="clear"></div>
			</div>
			<?php if($args['max_depth']!=$depth) { ?>
		</div>
		<div class="clear"></div>
		<?php } ?>
	</div>
<?php } ?>