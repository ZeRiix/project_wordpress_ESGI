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

        <div class="grid grid-rows-6 grid-cols-1 lg:grid-cols-3 lg:grid-rows-2 gap-[50px]">
            <article class="flex flex-col gap-[20px]">
                <h4 class="mb-[10px] text-lg lg:text-xl xl:text-3xl text-slate-900">Suspendisse aliquet efficitur
                    porttitor. In ornare varius.</h4>

                <span class="text-lg lg:text-xl text-slate-900 font-bold">Uncategorized, July 5, 2022</span>

                <p class="text-lg lg:text-xl text-zinc-500">Nulla hendrerit, mauris non convallis lacinia, quam quam
                    eleifend massa, id fermentum magna tellus in augue. Vestibulum scelerisque mauris.</p>
            </article>

            <article class="flex flex-col gap-[20px]">
                <h4 class="mb-[10px] text-lg lg:text-xl xl:text-3xl text-slate-900">Suspendisse aliquet efficitur
                    porttitor. In ornare varius.</h4>

                <span class="text-lg lg:text-xl text-slate-900 font-bold">Uncategorized, July 5, 2022</span>

                <p class="text-lg lg:text-xl text-zinc-500">Nulla hendrerit, mauris non convallis lacinia, quam quam
                    eleifend massa, id fermentum magna tellus in augue. Vestibulum scelerisque mauris.</p>
            </article>

            <article class="flex flex-col gap-[20px]">
                <h4 class="mb-[10px] text-lg lg:text-xl xl:text-3xl text-slate-900">Suspendisse aliquet efficitur
                    porttitor. In ornare varius.</h4>

                <span class="text-lg lg:text-xl text-slate-900 font-bold">Uncategorized, July 5, 2022</span>

                <p class="text-lg lg:text-xl text-zinc-500">Nulla hendrerit, mauris non convallis lacinia, quam quam
                    eleifend massa, id fermentum magna tellus in augue. Vestibulum scelerisque mauris.</p>
            </article>

            <article class="flex flex-col gap-[20px]">
                <h4 class="mb-[10px] text-lg lg:text-xl xl:text-3xl text-slate-900">Suspendisse aliquet efficitur
                    porttitor. In ornare varius.</h4>

                <span class="text-lg lg:text-xl text-slate-900 font-bold">Uncategorized, July 5, 2022</span>

                <p class="text-lg lg:text-xl text-zinc-500">Nulla hendrerit, mauris non convallis lacinia, quam quam
                    eleifend massa, id fermentum magna tellus in augue. Vestibulum scelerisque mauris.</p>
            </article>

            <article class="flex flex-col gap-[20px]">
                <h4 class="mb-[10px] text-lg lg:text-xl xl:text-3xl text-slate-900">Suspendisse aliquet efficitur
                    porttitor. In ornare varius.</h4>

                <span class="text-lg lg:text-xl text-slate-900 font-bold">Uncategorized, July 5, 2022</span>

                <p class="text-lg lg:text-xl text-zinc-500">Nulla hendrerit, mauris non convallis lacinia, quam quam
                    eleifend massa, id fermentum magna tellus in augue. Vestibulum scelerisque mauris.</p>
            </article>

            <article class="flex flex-col gap-[20px]">
                <h4 class="mb-[10px] text-lg lg:text-xl xl:text-3xl text-slate-900">Suspendisse aliquet efficitur
                    porttitor. In ornare varius.</h4>

                <span class="text-lg lg:text-xl text-slate-900 font-bold">Uncategorized, July 5, 2022</span>

                <p class="text-lg lg:text-xl text-zinc-500">Nulla hendrerit, mauris non convallis lacinia, quam quam
                    eleifend massa, id fermentum magna tellus in augue. Vestibulum scelerisque mauris.</p>
            </article>
        </div>
    </section>
</main>
<?php
print_r($posts);
?>
<?php get_footer(); ?>