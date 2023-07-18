    <footer
        class="w-[100%] min-h-[380px] p-[30px] lg:p-[50px] xl:px-[150px] xl:py-[75px] flex flex-col justify-between gap-[30px] lg:gap-0 bg-slate-900">
        <div class="flex flex-col lg:flex-row justify-between gap-[30px] lg:gap-0">
            <a href="/" class="w-[115px] lg:w-[230px] h-[35px] lg:h-[70px]">
                <img src="<?php echo esgi_get_site_logo()['logo_white']; ?>" alt="logo" class="w-full h-full" />
            </a>

            <div class="flex flex-col lg:flex-row gap-[30px] lg:gap-[95px] text-white">
                <div class="flex flex-col gap-[5px]">
                    <h5 class="mb-[20px] font-semibold">Manager</h5>

                    <span><?php echo esgi_get_services()['manager']['phone']; ?></span>

                    <span><?php echo esgi_get_services()['manager']['email']; ?></span>
                </div>
                <div class="flex flex-col gap-[5px]">
                    <h5 class="mb-[20px] font-semibold">CEO</h5>

                    <span><?php echo esgi_get_services()['ceo']['phone']; ?></span>

                    <span><?php echo esgi_get_services()['ceo']['email']; ?></span>
                </div>
            </div>
        </div>

        <div class="flex justify-between gap-[30px]">
            <div class="mt-[30px] text-white text-[15px] font-normal">&copy;<?= date("Y") ?> Figma Template by ESGI
            </div>

            <div class="flex gap-[30px] mt-[30px]">
                <a href="<?php echo esgi_get_social_networks()['facebook']['url'] ?>" target="_blank">
                    <img src="<?php echo img_uri(); ?>svg/facebook.svg" alt="facebook" class="w-[21px] h-[21px]" />
                </a>

                <a href="<?php echo esgi_get_social_networks()['linkedin']['url'] ?>" target="_blank">
                    <img src="<?php echo img_uri(); ?>svg/linkedin.svg" alt="linkedin" class="w-[21px] h-[21px]" />
                </a>
            </div>
        </div>
    </footer>

    <script>
btnToggle.addEventListener("click", () => {
    divMenu.style.top = "0";

});

btnToggleMenu.addEventListener("click", () => {
    divMenu.style.top = "-950px";
});
    </script>

    <?php wp_footer(); ?>
    </body>

    </html>