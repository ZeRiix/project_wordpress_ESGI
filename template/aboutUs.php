<?php get_header(); ?>

<main class="max-w-[1920px] pt-[135px] px-[30px] pb-[30px] mx-auto">
    <section
        class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[65px] xl:mb-[130px] flex flex-col gap-[58px] lg:gap-[115px] xl:gap-[230px]">
        <h1 class="text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900">About us</h1>

        <div class="w-full max-w-[1490px] self-end">
            <img src="<?php echo img_uri() ?>png/4.png" class="w-full">
        </div>
    </section>

    <section class="mb-[65px] xl:mb-[130px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
        <div class="w-full max-w-[1490px] ml-[30px] lg:ml-[50px] xl:ml-[150px] self-end">
            <div class="max-w-[900px]">
                <h2 class="mb-[20px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">About Us</h2>

                <p class="text-lg lg:text-xl xl:text-2xl text-zinc-500">
                    Specializing in the creation of exceptional events for private and corporate clients, we design,
                    plan and manage every project from conception to execution.
                </p>
            </div>
        </div>

        <?php include 'includes/about-us.php' ?>
    </section>

    <section class="mb-[65px] xl:mb-[130px]">
        <h2 class="mb-[64px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">Our Team</h2>

        <div class="grid grid-rows-4 grid-cols-1 lg:grid-cols-4 lg:grid-rows-1 gap-[50px]">
            <?php
            $team = esgi_get_team_members();
            foreach ($team as $member) {
                echo '
                    <div class="flex flex-col items-center lg:items-start gap-[25px]">
                        <img src="' . $member['image'] . '" class="lg:w-full max-w-[440px] lg:max-w-auto mb-[10px]">

                        <h4 class="mb-[4px] text-lg lg:text-2xl xl:text-4xl text-slate-900">' . $member['work'] . '</h4>

                        <span class="text-base lg:text-lg xl:text-xl text-zinc-500">' . $member['phone'] . '</span>

                        <span class="text-base lg:text-lg xl:text-xl text-zinc-500">' . $member['email'] . '</span>
                    </div>
                ';
            }
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>