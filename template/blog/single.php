<?php
if (isset($_GET['p'])) {
    $post = get_post_by_id($_GET['p']);
    add_comment($_GET['p'], $_POST['message'], $_POST['author']);
    $comments = get_comments_by_post_id($_GET['p']);
}
?>
<?php get_header(); ?>

    <main class="max-w-[1920px] pt-[135px] mx-auto">
        <section
                class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[65px] xl:mb-[130px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
            <h1 class="text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900"><?= $post["title"].'.' ?></h1>

            <div class="flex flex-col lg:flex-row gap-[50px]">
                <?php include 'sidebar.php' ?>

                <div id="content" class="flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
                    <article class="w-full max-[1050px] mx-auto grow-0 flex flex-col gap-[50px]">
                        <div class="w-full h-[150px] lg:h-[300px] xl:h-[500px] pr-[20px]">
                            <?php
                            $src = "https://via.placeholder.com/1050x500";

                            if (has_post_thumbnail($post->ID)) {
                                $src = get_the_post_thumbnail_url($post->ID);
                            }
                            ?>

                            <img src="<?= $src ?>" class="w-full h-full object-cover"/>
                        </div>
                        <span class="text-lg lg:text-xl text-slate-900 font-bold">
                        <?php
                        $categories = get_the_category($post->ID);
                        foreach ($categories as $category) {
                            echo $category->name . " ";
                        }
                        ?>
                        - <?= wp_date('j F Y', strtotime($post->post_date)) ?></span>

                        <?= get_the_content($post->ID) ?>

                        <div class="flex flex-wrap gap-[15px]">
                            <?php
                            $tags = get_the_tags();

                            foreach ($tags as $tag) {
                                ?>
                                <a href="<?= get_tag_link($tag->term_id) ?>"
                                   class="p-[5px] text-xs lg:text-sm text-zinc-500 font-medium bg-[#F8F8F8]">
                                    <?= $tag->name ?>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </article>

                    <div id="comments" class="flex flex-col gap-[25px] pr-[20px]">
                        <h1 class="font-semibold text-5xl lg:text-4xl">Comments (<?= count($comments) ?>)</h1>
                        <?php foreach ($comments as $comment) {
                            if (!empty($comment["author"]) && !empty($comment["content"])) { ?>
                                <div class="flex flex-col items-start bg-[#F9F9F9] py-[30px] px-[40px] gap-[25px]">
                                    <h3 class="font-semibold text-3xl lg:text-2xl"><?= $comment["author"] ?></h3>
                                    <p class="text-lg lg:text-xl text-zinc-500"><?= $comment["content"] ?></p>
                                    <div class="flex items-center justify-center gap-[15px]">
                                        <img class="h-[14px] w-[16px]" src="<?php echo esgi_get_site_logo()['comment_reply'];?>"
                                             alt="Reply">
                                        <a href="#comment-form" class="font-semibold text-lg lg:text-xl cursor-pointer">Reply</a>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>

                    <div id="comment-form" class="pr-[20px]">
                        <h1 class="text-5xl lg:text-4xl">Leave a reply</h1>
                        <form class="mt-[45px] flex flex-col gap-[32px]" action="<?php echo get_current_uri() ?>"
                              method="POST">
                            <input type="text" name="author" placeholder="Full name"
                                   class="w-full h-[50px] border-b-[2px] px-[20px] py-[10px] text-lg lg:text-xl text-zinc-500 font-medium focus:outline-none">
                            <label class="text-zinc-500 border-l-[3px] px-[8px]  text-lg lg:text-xl border-black text-zinc-500"
                                   for="message">Message</label>
                            <textarea name="message"
                                      class="w-full h-[200px] border-b-[2px] px-[20px] py-[10px] text-lg lg:text-xl text-zinc-500 font-medium focus:outline-none"></textarea>
                            <input type="submit" value="Submit"
                                   class="w-full text-left text-lg lg:text-xl font-semibold cursor-pointer">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>