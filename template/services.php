<?php get_header(); ?>

<main class="max-w-[1920px] pt-[135px] px-[30px] mx-auto">
    <section class="mb-[65px] xl:mb-[130px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
        <h1 class="ml-[30px] lg:ml-[50px] xl:ml-[150px] text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900">Our Services</h1>

        <?php include 'includes/our-services.php' ?>
    </section>

    <section class="mb-[65px] xl:mb-[130px]">
        <h2 class="mb-[20px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">Corp. Parties</h2>

        <p class="max-w-[900px] text-lg lg:text-xl xl:text-2xl text-zinc-500">
            Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution. 
        </p>
    </section>

    <section class="h-[200px] lg:h-[400px] xl:h-[600px] mx-[-30px] object-cover">
        <img src="<?php echo img_uri(); ?>png/9.png" class="w-full h-full">
    </section>
</main>

<?php get_footer(); ?>