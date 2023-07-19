<?php get_header(); ?>

<?php
$args = array(
    'posts_per_page'      => 6,
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
);

$posts_query = new WP_Query($args);
?>

<main class="max-w-[1920px] pt-[135px] mx-auto">
    <section class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[65px] xl:mb-[130px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
        <h1 class="text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900">Blog</h1>

        <div class="flex flex-col lg:flex-row gap-[30px]">
            <?php include 'sidebar.php' ?>

            <div class="articles">
                <div class="mx-[20px] flex flex-col gap-[30px]">
                    <div class="grow-0 grid grid-rows-6 sm:grid-rows-3 grid-cols-[repeat(1,minmax(0,500px))] sm:grid-cols-[repeat(2,minmax(0,500px))] gap-[50px]">
                        <?php 
                        if($posts_query->have_posts()){
                            while($posts_query->have_posts()){
                                $posts_query->the_post();
                                $post = get_post();
                        ?>

                        <article>
                            <a href="<?= get_permalink($post->ID) ?>" class="flex flex-col gap-[35px]">
                                <div class="relative h-[170px] lg:h-[250px] xl:h-[330px]">
                                    <?php 
                                    $categories = get_the_category($post->ID);

                                    $src = "https://via.placeholder.com/500x330";

                                    if(has_post_thumbnail($post->ID)){
                                        $src = get_the_post_thumbnail_url($post->ID);
                                    }
                                    ?>

                                    <div class="absolute top-[15px] left-[15px] w-2/3 flex flex-wrap gap-[5px] text-white px-[10px] py-[5px] text-xs lg:text-base">
                                    <?php foreach ($categories as $category) { ?>
                                        <span class="text-base lg:text-xl text-white">
                                            <?php
                                            if(count($categories) > 1 && $category !== end($categories)){
                                                echo $category->name . ',';
                                            } else {
                                                echo $category->name;
                                            }
                                            ?>
                                            </span>
                                    <?php } ?>
                                    </div>

                                    <img src="<?= $src ?>" class="w-full h-full object-cover bg-center" />
                                </div>
                                
                                <div class="flex flex-col gap-[15px]">
                                    <h3 class="wfull mb-[30px] text-xl lg:text-2xl lg:text-4xl text-slate-900 truncate"><?= $post->post_title ?></h3>
                                    
                                    <div class="text-base lg:text-xl text-zinc-500 description">
                                        <?= get_the_content($post->ID) ?>  
                                    </div>
                                    
                                </div>
                            </a>
                        </article>
                        
                        <?php 
                            }
                        } 
                        ?>
                    </div>

                    <div class="pagination">
                    <?php
                    $pagination_args = array(
                        'mid_size' => 4,
                        'prev_text' => '<',
                        'next_text' => '>',
                        'total' => $posts_query->max_num_pages,
                        'type' => 'array'
                    );

                    $pagination_links = paginate_links($pagination_args);

                    if ($pagination_links) {
                        echo '<div class="mt-[30px] flex pagination">';
                        
                        foreach ($pagination_links as $link) {
                        $link = str_replace('page-numbers', 'page-numbers ajax-link', $link);
                        echo $link;
                        }
                        echo '</div>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style type="text/css">
    .description p {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .page-numbers {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: rgb(15, 23, 42);
    }

    .page-numbers.current {
        color: white;
        background-color: rgb(15, 23, 42);
    }
</style>

<?php get_footer(); ?>