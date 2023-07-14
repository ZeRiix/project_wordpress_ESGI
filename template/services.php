<?php get_header(); ?>
<div class="w-[100%] h-[1836px] relative">
    <div class="w-[1800px] h-[991px] left-0 top-[845px] absolute">
        <div class="w-[1800px] h-[631px] left-0 top-[360px] absolute">
            <img class="w-[1800px] h-[631px] left-0 top-0 absolute" src="<?php img_uri(); ?>png/4.png" />
        </div>
        <div
            class="w-[914px] h-[140px] left-[158px] top-[95px] absolute text-zinc-500 text-[26px] font-normal leading-[42px]">
            Specializing in the creation of exceptional events for private and corporate clients, we design, plan
            and manage every project from conception to execution. </div>
        <div class="w-[481px] h-[79px] pr-[66px] left-[155px] top-0 absolute justify-start items-center inline-flex">
            <div class="text-slate-900 text-[63px] font-semibold tracking-[3px]">Corp. Parties</div>
        </div>
    </div>
    <div class="w-[1800px] h-[714px] left-0 top-0 absolute">
        <div class="w-[480px] h-[480px] left-[1440px] top-[234px] absolute">
            <img class="w-[480px] h-[480px] left-0 top-0 absolute" src="<?php img_uri(); ?>png/3.png" />
        </div>
        <div class="w-[480px] h-[480px] left-[960px] top-[234px] absolute">
            <div class="w-[480px] h-[480px] left-0 top-0 absolute bg-zinc-300 bg-white"></div>
            <div class="w-[480px] h-[480px] left-0 top-0 absolute bg-white">
                <div
                    class="w-[242px] h-[58px] left-[119px] top-[211px] absolute flex-col justify-center items-end gap-[9px] inline-flex">
                    <div class="text-slate-900 text-[35px] font-semibold">Private Parties</div>
                    <div class="w-60 h-[5px] bg-gradient-to-r from-orange-200 to-pink-400"></div>
                </div>
            </div>
        </div>
        <div class="w-[480px] h-[480px] left-[480px] top-[234px] absolute">
            <img class="w-[480px] h-[480px] left-0 top-0 absolute" src="<?php img_uri(); ?>png/11.png" />
            <div class="w-[480px] h-[480px] left-0 top-[234px] absolute">
                <img class="w-[480px] h-[480px] left-0 top-0 absolute" src="<?php img_uri(); ?>png/12.png" />
            </div>
            <div class="w-[515px] h-[105px] left-[156px] top-0 absolute justify-center items-center inline-flex">
                <div class="text-slate-900 text-[84px] font-semibold">Our Services.</div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>


    <?php
    $the_query = new WP_Query(array(
        'category_name' => 'aboutus',
        'post_status' => 'publish',
        'posts_per_page' => 1,
    ));

    $the_query2 = new WP_Query(array(
        'category_name' => 'aboutus',
        'post_status' => 'publish',
        'posts_per_page' => 1,
    ));

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            echo '<h2>' . get_the_title() . '</h2>';
            $test = explode('<!--more-->', get_the_content());
            var_dump($test);
        }
    } else {
        echo '<p>ntm</p>';
    }

    ?>