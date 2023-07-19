<?php
// if (isset($_GET['p'])) {
//     $post = get_post_by_id($_GET['p']);
//     add_comment($_GET['p'], $_POST['message'], $_POST['author']);
//     $comments = get_comments_by_post_id($_GET['p']);
// }
?>

<!-- <div class="h-[200px]"></div>

<h1><?= $post['title'] ?></h1>
<p><?= $post['content'] ?></p>

<h1>Comments <?= count($comments) ?></h1>
<?php foreach ($comments as $comment) {
    if (!empty($comment["author"]) && !empty($comment["content"])) {
        echo $comment["author"] . " : <br> " . $comment["content"] . "<br/>";
    }
} ?>

<form class="flex flex-col" action="<?php echo get_current_uri() ?>" method="POST">
    <label for="reply">Leave a reply</label>
    <input type="text" placeholder="Full name" name="author" />
    <input type="text" placeholder="Message" name="message" />
    <input type="submit" value="Submit" />

</form> -->

<?php get_header(); ?>

<?php
$args = array(
    'posts_per_page'      => 6,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'post',
);

$posts = new WP_Query($args);
?>

<main class="max-w-[1920px] pt-[135px] mx-auto">
    <section class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[65px] xl:mb-[130px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
        <h1 class="text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900"><?= the_title()?></h1>

        <div class="flex flex-col lg:flex-row gap-[30px]">
            <?php include 'sidebar.php' ?>

            <div class="mx-[20px] grow-0">
                
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>