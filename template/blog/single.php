<?php
if (isset($_GET['p'])) {
    $post = get_post_by_id($_GET['p']);
    add_comment($_GET['p'], $_POST['message'], $_POST['author']);
    $comments = get_comments_by_post_id($_GET['p']);
}
?>

<h1>Comments <?= count($comments) ?></h1>
<?php foreach ($comments as $comment) {
    if (!empty($comment["author"]) && !empty($comment["content"])) {
        echo $comment["author"] . " : <br> " . $comment["content"] . "<br/>";
    }
} ?>

<?php get_header(); ?>

<main class="max-w-[1920px] pt-[135px] mx-auto">
    <section class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[65px] xl:mb-[130px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
        <h1 class="text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900"><?= the_title($post->ID)?></h1>

        <div class="flex flex-col lg:flex-row gap-[50px]">
            <?php include 'sidebar.php' ?>

            <div class="flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
                <article class="w-full max-[1050px] mx-auto grow-0 flex flex-col gap-[50px]">
                    <div class="w-full h-[150px] lg:h-[300px] xl:h-[500px] pr-[20px]">
                        <?php 
                        $src = "https://via.placeholder.com/1050x500";

                        if(has_post_thumbnail($post->ID)){
                            $src = get_the_post_thumbnail_url($post->ID);
                        }
                        ?>

                        <img src="<?= $src ?>" class="w-full h-full object-cover" />
                    </div>

                    <span class="text-lg lg:text-xl text-slate-900 font-bold"><?= get_the_category($post->ID) ?> - <?= wp_date('j F Y', strtotime($post->post_date)) ?></span>
                
                    <?= get_the_content($post->ID) ?>

                    <div class="flex flex-wrap gap-[15px]">
                        <?php 
                        $tags = get_the_tags();

                        foreach($tags as $tag){
                        ?>
                        <a href="<?= get_tag_link($tag->term_id) ?>" class="p-[5px] text-xs lg:text-sm text-zinc-500 font-medium bg-[#F8F8F8]">
                            <?= $tag->name ?>
                        </a>
                        <?php 
                        }
                        ?>
                    </div>
                </article>

                <div>
                    <!-- TODO: display comment -->
                </div>

                <div>
                    <!-- TODO: form comment -->
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>