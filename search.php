<?php
if (isset($_GET['s'])) {
    $posts = esgi_search_posts(get_search_query());
}
?>
<?php get_header() ?>
<main class="max-w-[1920px] pt-[135px] pb-[30px] mx-auto">
    <section
        class="mb-[65px] xl:mb-[130px] px-[30px] lg:px-[50px] xl:px-[150px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
        <h1 class="flex gap-[10px] text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900">
            Search results for:

            <div class="flex flex-col">
                <span class="mb-[4px]"><?= get_search_query() ?></span>

                <div class="w-full h-[4px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
            </div>
        </h1>

        <?php if(!is_array($posts)) { ?>
        <p class="text-lg lg:text-xl text-zinc-500"><?= $posts ?></p>
        <?php } ?>

        <div class="grid grid-rows-6 grid-cols-1 lg:grid-cols-3 lg:grid-rows-2 gap-[50px]">
            <?php if(is_array($posts)) {
                foreach ($posts as $post) {
            ?>
            <a href="<?= $post['permalink'] ?>">
                <article class="flex flex-col gap-[20px]">
                    <h4 class="mb-[10px] text-lg lg:text-xl xl:text-3xl text-slate-900"><?= $post['title'] ?></h4>

                    <span class="text-lg lg:text-xl text-slate-900 font-bold"><?= $post['category'][0] ?>, <?= $post['date'] ?></span>

                    <p class="text-lg lg:text-xl text-zinc-500 description">
                        <?= $post['content'] ?>
                    </p>
                </article>
            </a>
            <?php } 
            } else {
                $posts = new WP_Query(
                    array(
                        'posts_per_page'      => 6,
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => 'post',
                    )
                );

                if($posts->have_posts()){
                    while($posts->have_posts()){
                        $posts->the_post();
                        $post = get_post();
            ?>
            <a href="<?= get_permalink($post->ID) ?>">
                <article class="flex flex-col gap-[20px]">
                    <h4 class="mb-[10px] text-lg lg:text-xl xl:text-3xl text-slate-900"><?= $post->post_title ?></h4>

                    <span class="text-lg lg:text-xl text-slate-900 font-bold"><?= get_the_category($post->ID) ?>, <?= wp_date('j F Y', strtotime($post->post_date)) ?></span>

                    <div class="text-lg lg:text-xl text-zinc-500 description">
                        <?= get_the_content($post->ID) ?>  
                    </div>
                </article>
            </a>
            <?php
                    }
                }
            }
            ?>
        </div>
    </section>
</main>

<style type="text/css">
    .description, .description p {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<?php get_footer(); ?>