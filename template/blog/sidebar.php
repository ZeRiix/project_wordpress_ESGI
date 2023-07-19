<?php
$args = array(
    'posts_per_page'      => 4,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'post',
);

$recent_posts = new WP_Query($args);
?>

<aside class="relative w-full lg:min-w-[370px] lg:max-w-[500px] pr-[20px] lg:pr-0 flex flex-col gap-[60px]">
    <div class="relative">
        <h3 class="mb-[30px] text-lg lg:text-xl text-slate-900">Search</h3>

        <?php get_search_form(); ?>
    </div>

    <div class="relative">
        <h3 class="mb-[30px] font-semibold text-lg lg:text-xl text-slate-900">Recent posts</h3>

        <div class="flex flex-col gap-[30px]">
            <?php
            if ($recent_posts->have_posts()) {
                while ($recent_posts->have_posts()) {
                    $recent_posts->the_post();
                    $post = get_post();
            ?>

            <article>
                <a href="<?= get_permalink($post->ID) ?>" class="flex gap-[25px]">
                    <div class="w-[88px] h-full flex-shrink-0">
                        <?php
                                $src = "https://via.placeholder.com/88x88";

                                if (has_post_thumbnail($post->ID)) {
                                    $src = get_the_post_thumbnail_url($post->ID);
                                }
                                ?>

                        <img src="<?= $src ?>" class="w-full aspect-square" />
                    </div>

                    <div class="flex flex-col justify-between flex-1 content">
                        <h4 class="mb-[10px] text-lg lg:text-xl text-zinc-500"><?= $post->post_title ?></h4>

                        <time
                            class="text-xs lg:text-sm text-zinc-500"><?= wp_date('j F Y', strtotime($post->post_date)) ?></time>
                    </div>
                </a>
            </article>

            <?php
                }
            }
            ?>
        </div>
    </div>

    <div>
        <h3 class="mb-[30px] font-semibold text-lg lg:text-xl text-slate-900">Categories</h3>

        <ul class="flex flex-col gap-[20px] categories">
            <?php
            $categories = get_categories();

            foreach ($categories as $category) {
            ?>
            <li class="flex items-center">
                <a href="<?= get_current_uri() . '&category=' . $category->name ?>"
                    class="flex gap-[10px] text-lg lg:text-xl text-zinc-500">
                    <?= $category->name ?>
                </a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div>
        <h3 class="mb-[30px] font-semibold text-lg lg:text-xl text-slate-900">Tags</h3>

        <div class="flex flex-wrap gap-[15px]">
            <?php
            $tags = get_tags();

            foreach ($tags as $tag) {
            ?>
            <a href="<?= get_current_uri() . '&tags=' . $tag->name ?>"
                class="p-[5px] text-xs lg:text-sm text-zinc-500 font-medium bg-[#F8F8F8]">
                <?= $tag->name ?>
            </a>
            <?php
            }
            ?>
        </div>
    </div>
</aside>

<style type="text/css">
.searchform input[name="s"] {
    position: relative;
    z-index: 10;
    width: 100%;
    padding-bottom: 8px;
    outline: none;
    color: black;
    border-bottom: 2px solid #4a5568;
    background-color: transparent;
}

.searchform input[type="submit"] {
    position: absolute;
    right: 0;
    cursor: pointer;
    /* hide text */
    text-indent: -9999px;
    z-index: 10;
    /* add icon */
    background-image: url('https://nas-mat.synology.me/hosted-img/icons/search-black.svg');
    background-repeat: no-repeat;
    background-position: center;
    width: 16px;
    height: 16px;
}

ul.categories li::before {
    content: "\2022";
    color: pink;
    font-weight: bold;
    display: inline-block;
    width: 1em;
    margin-left: -1em;
}
</style>