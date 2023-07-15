<?php get_header(); ?>

<main class="max-w-[1920px] pt-[135px] px-[30px] pb-[30px] mx-auto">
    <!-- Hero section -->
    <section class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[32px] lg:mb-[65px] xl:mb-[130px] flex flex-col gap-[58px] lg:gap-[115px] xl:gap-[230px]">
        <h1 class="text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900">A really professional structure<br>for all your events!</h1>

        <div class="w-full max-w-[1490px] self-end">
            <img src="<?php echo img_uri() ?>png/1.png">
        </div>
    </section>

    <!-- About section -->
    <section class="mb-[32px] lg:mb-[65px] xl:mb-[130px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
        <div class="w-full max-w-[1490px] ml-[30px] lg:ml-[50px] xl:ml-[150px] self-end">
            <div class="max-w-[900px]">
                <h2 class="mb-[20px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">About Us</h2>

                <p class="text-lg lg:text-xl xl:text-2xl text-zinc-500">
                    Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution. 
                </p>
            </div>
        </div>

        <div class="w-full max-w-[1490px] mr-[30px] lg:mr-[50px] xl:mr-[150px] flex flex-col lg:flex-row gap-[32px] lg:gap-0 justify-between items-center">
            <div class="w-full max-w-[660px] dis">
                <img src="<?php echo img_uri() ?>png/2.png">
            </div>

            <ul class="max-w-[640px] flex flex-col gap-[60px]">
                <li>
                    <h3 class="mb-[20px] text-xl lg:text-3xl xl:text-5xl text-slate-900">Who are we?</h3>
                    
                    <p class="text-base lg:text-lg xl:text-xl text-zinc-500">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu convallis elit, at convallis magna.
                    </p>
                </li>

                <li>
                    <h3 class="mb-[20px] text-xl lg:text-3xl xl:text-5xl text-slate-900">Our vision</h3>

                    <p class="text-base lg:text-lg xl:text-xl text-zinc-500">
                        Nullam faucibus interdum massa. Duis eget leo mattis, pulvinar nisi et, consequat lectus. Suspendisse commodo magna orci, id luctus risus porta pharetra. Fusce vehicula aliquet urna non ultricies.
                    </p>
                </li>

                <li>
                    <h3 class="mb-[20px] text-xl lg:text-3xl xl:text-5xl text-slate-900">Our mission</h3>

                    <p class="text-base lg:text-lg xl:text-xl text-zinc-500">
                        Vivamus et viverra neque, ut pharetra ipsum. Aliquam eget consequat libero, quis cursus tortor. Aliquam suscipit eros sit amet velit malesuada dapibus. Fusce in vehicula tellus. Donec quis lorem ut magna tincidunt egestas. 
                    </p>
                </li>
            </ul>
        </div>
    </section>

    <!-- Services section -->
    <section class=" mb-[32px] lg:mb-[65px] xl:mb-[130px]">
        <h2 class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[64px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">Our Services</h2>
    
        <div class="lg:max-h-[480px] grid grid-rows-4 grid-cols-1 lg:grid-cols-4 lg:grid-rows-1">
            <img src="<?php echo img_uri() ?>png/12.png" class="mx-auto aspect-square">

            <img src="<?php echo img_uri() ?>png/11.png" class="mx-auto aspect-square">

            <div class="flex justify-center items-center" class="mx-auto aspect-square">
                <div>
                    <h4 class="mb-[4px] text-lg lg:text-2xl xl:text-4xl text-slate-900">Private Parties</h4>

                    <div class="w-full h-[4px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                </div>
            </div>

            <img src="<?php echo img_uri() ?>png/3.png" class="mx-auto aspect-square">
        </div>
    </section>

    <!-- Partners section -->
    <section class=" mb-[32px] lg:mb-[65px] xl:mb-[130px]">
        <h2 class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[64px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">Our Partners</h2>

        <div class="flex flex-wrap justify-center gap-[120px]">
            <img src="<?php echo img_uri() ?>svg/partner-1.svg">

            <img src="<?php echo img_uri() ?>svg/partner-2.svg">

            <img src="<?php echo img_uri() ?>svg/partner-3.svg">

            <img src="<?php echo img_uri() ?>svg/partner-4.svg">

            <img src="<?php echo img_uri() ?>svg/partner-5.svg">

            <img src="<?php echo img_uri() ?>svg/partner-6.svg">
        </div>
    </section>
</main>

<?php get_footer(); ?>