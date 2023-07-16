<?php get_header(); ?>

<main class="max-w-[1920px] pt-[135px] px-[30px] pb-[30px] mx-auto">
    <section class="ml-[30px] lg:ml-[50px] xl:ml-[150px] mb-[65px] xl:mb-[130px] flex flex-col gap-[32px] lg:gap-[65px] xl:gap-[130px]">
        <div>
            <h1 class="mb-[48px] text-3xl lg:text-5xl xl:text-7xl font-semibold text-slate-900">Contacts</h1>
        
            <p class="text-lg lg:text-xl xl:text-2xl text-zinc-500">A desire for a big big party or a very select congress? Contact us.</p>
        </div>

        <div class="w-full max-w-[1490px] self-end">
            <div class="mb-[65px] xl:mb-[130px] flex flex-col lg:flex-row justify-center lg:justify-end gap-[90px]">
                <div class="flex flex-col gap-[10px] text-center lg:text-right">
                    <h5 class="mb-[15px] text-base lg:text-xl xl:text-3xl font-semibold text-slate-900">Location</h5>

                    <span class="text-zinc-500">242 Rue du Faubourg Saint-Antoine</span>

                    <span class="text-zinc-500">75020 Paris FRANCE</span>
                </div>

                <div class="flex flex-col gap-[10px] text-center lg:text-right">
                    <h5 class="mb-[15px] text-base lg:text-xl xl:text-3xl font-semibold text-slate-900">Manager</h5>

                    <span class="text-zinc-500">+33 1 53 31 25 23</span>

                    <span class="text-zinc-500">info@company.com</span>
                </div>

                <div class="flex flex-col gap-[10px] text-center lg:text-right">
                    <h5 class="mb-[15px] text-base lg:text-xl xl:text-3xl font-semibold text-slate-900">CEO</h5>

                    <span class="text-zinc-500">+33 1 53 31 25 25</span>

                    <span class="text-zinc-500">ceo@company.com</span>
                </div>
            </div>

            <img src="<?php echo img_uri() ?>png/10.png" class="w-full">
        </div>
    </section>

    <section class="mb-[65px] xl:mb-[130px]">
        <div class="mb-[60px]">
            <h2 class="mb-[20px] text-2xl lg:text-4xl xl:text-6xl text-slate-900">Write us here</h2>

            <p class="text-lg lg:text-xl xl:text-2xl text-zinc-500">Go! Don’t be shy.</p>
        </div>
        
        <div class="contact-form max-w-[1050px] text-zinc-400 text-xl font-normal leading-[38px]">
            <?php form_contact(); ?>

            <!-- Contact Form 7 - thème -->
            <!-- <div class="flex flex-col gap[30px]">
                <label>Subject [text* your-subject]</label>

                <div class="flex gap-[50px]">
                    <label>Your email [email* your-email autocomplete:email]</label>

                    <label>Phone no. [tel* tel-170 id:phone class:phone placeholder "+33"]</label>
                </div>

                <label>Your message [textarea* your-message]</label>

                <div class="mt-[10px] font-extrabold text-slate-900 cursor-pointer">[submit "Submit"]</div>
            </div> -->
        </div>
    </section>
</main>

<style type="text/css">
    .wpcf7-form {
        max-width: 1050px;
    }

    .wpcf7-form p {
        width: 100%;
    }

    .wpcf7-text {
        margin-bottom: 20px;
        width: 100%;
        outline: none;
        border-bottom: 1px solid rgb(161 161 170);
    }

    .wpcf7-textarea {
        margin-bottom: 20px;
        width: 100%;
        height: 180px;
        outline: none;
        border: 1px solid rgb(161 161 170);
    }
    </style>

<?php get_footer(); ?>