<?php get_header(); ?>
<!-- content -->
<?php
if (isset($_GET['p'])) {
    include get_theme_path('template/blog/single.php');
}
?>
<?php get_footer(); ?>