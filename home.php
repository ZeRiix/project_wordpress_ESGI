<?php get_header(); ?>

<main class="max-w-[1920px] pt-[135px] mx-auto">
    <!-- Hero section -->
    <section class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[65px] xl:mb-[130px] flex flex-col gap-[58px] lg:gap-[115px] xl:gap-[230px]">
        <h1 class="text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900">A really professional structure<br
                class="hidden lg:block">for all your events!</h1>

        <div class="w-full max-w-[1490px] self-end">
            <img src="<?php echo img_uri() ?>png/1.png" class="w-full">
        </div>
    </section>

    <!-- About section -->
    <section class="mb-[65px] xl:mb-[130px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px] flex flex-col">
        <div class="ml-[30px] lg:ml-[50px] xl:ml-[150px] flex justify-end">
            <div class="w-full max-w-[1490px] self-end">
                <div class="w-full max-w-[900px]">
                    <h2 class="mb-[20px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">About Us</h2>

                    <p class="text-lg lg:text-xl xl:text-2xl text-zinc-500">
                        Specializing in the creation of exceptional events for private and corporate clients, we design,
                        plan and manage every project from conception to execution.
                    </p>
                </div>
            </div>
        </div>

        <?php include 'template/includes/about-us.php' ?>
    </section>

    <!-- Services section -->
    <section class="mb-[65px] xl:mb-[130px]">
        <h2 class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[64px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">Our
            Services</h2>

        <?php include 'template/includes/our-services.php' ?>
    </section>
    <?php $pass = false;
    foreach (esgi_get_partners() as $key => $value) {
        if ($value != false || $value !== "") {
            $pass = true;
        }
    }
    if ($pass) { ?>
    <!-- Partners section -->
    <section class="mb-[65px] xl:mb-[130px]">
        <h1 class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[64px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">
            Our Parteners</h1>

        <?php include 'template/includes/our-parteners.php' ?>
    </section>
    <?php } ?>
</main>

<?php get_footer(); ?>