<footer>

  <div class="row">

    <?php wp_nav_menu( array( 'theme_location' => 'footer-social', 'menu_class' => 'social' ) ); ?>

    <div class="clear"></div>

<!-- Please do not remove the link to AJTroxell.com, i'd appreciate it. -->
    <p class="copy">Copyright &copy; <?php echo date("Y") ?> <?php bloginfo('name'); ?> on <a href="http://wordpress.org" title="Wordpress" target="new">Wordpress</a>. Theme by <a href="http://ajtroxell.com" title="AJ Troxell" target="new">AJ Troxell</a>.</p>

  </div>

</footer>

</div>

<!-- Included JS Files -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.functions.js"></script>

<!-- Included Wordpress JS Files -->
<?php wp_footer(); ?>

</body>
</html>