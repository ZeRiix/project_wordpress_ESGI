<?php get_header(); ?>
<?php
if (isset($_GET['action'])) {
    include 'template/' . $_GET['action'] . '.php';
}
?>
<?php get_footer(); ?>