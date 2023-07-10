<div>
    <div id="divSansMenu" class="w-[1920px] h-[135px] relative">
        <div class="w-[1920px] h-[135px] left-0 top-0 absolute bg-white"></div>
        <button id="btnToggle" class="w-10 h-2.5 left-[1720px] top-[61px] absolute">
            <div class="w-10 h-[3px] left-0 top-0 absolute bg-slate-900"></div>
            <div class="w-[21px] h-[3px] left-[19px] top-[7px] absolute bg-slate-900"></div>
        </button>
        <div class="w-[140px] h-[42px] left-[160px] top-[48px] absolute">
            <div class="w-[140px] h-[42px] left-0 top-0 absolute">
                <img src="<?php echo get_template_directory_uri(); ?>/images/svg/logo.svg" alt="logo" />
            </div>
        </div>
        <?php wp_head(); ?>
    </div>

    <div id="divMenu" class="w-[1920px] h-[820px] relative z-9999 hidden">
        <div class="w-[1920px] h-[820px] left-0 top-0 absolute bg-slate-900"></div>
        <div class="w-[307px] h-[606px] left-[1456px] top-[115px] absolute">
            <div class="w-[195px] h-[88px] left-[112px] top-0 absolute">
                <div class="w-[187px] h-[5px] left-[5px] top-[83px] absolute bg-gradient-to-r from-orange-200 to-pink-400">
                </div>
                <div class="left-0 top-0 absolute text-white text-[70px] font-semibold">Home</div>
            </div>
            <div class="left-0 top-[104px] absolute text-white text-[70px] font-semibold">About Us</div>
            <div class="left-[35px] top-[207px] absolute text-white text-[70px] font-semibold">Services</div>
            <div class="left-[25px] top-[311px] absolute text-white text-[70px] font-semibold">Partners</div>
            <div class="left-[158px] top-[414px] absolute text-white text-[70px] font-semibold">Blog</div>
            <div class="left-[13px] top-[518px] absolute text-white text-[70px] font-semibold">Contacts</div>
        </div>
        <button id="btnToggleMenu" class="w-[16.99px] h-[16.99px] left-[1743px] top-[61px] absolute">
            <div class="w-[21px] h-[3px] left-[2.14px] top-[0.01px] absolute origin-top-left rotate-45 bg-white"></div>
            <div class="w-[21px] h-[3px] left-[16.97px] top-[2.12px] absolute origin-top-left rotate-[135deg] bg-white">
            </div>
        </button>
        <div class="pr-px left-[160px] top-[129px] absolute justify-center items-center inline-flex">
            <div class="text-white text-xl font-extrabold tracking-wide">Or try Search</div>
        </div>
        <div class="w-[133px] h-[39.90px] left-[160px] top-[49.40px] absolute">
            <div class="w-[133px] h-[39.90px] left-0 top-0 absolute">
                <img src="<?php echo get_template_directory_uri(); ?>/images/svg/logo.svg" alt="logo" />
            </div>
        </div>
    </div>
    <script>
        const btnToggle = document.getElementById("btnToggle");
        const btnToggleMenu = document.getElementById("btnToggleMenu");
        const divSansMenu = document.getElementById("divSansMenu");
        const divMenu = document.getElementById("divMenu");

        btnToggle.addEventListener("click", () => {
            divSansMenu.classList.add("hidden");
            divMenu.classList.remove("hidden");
        });

        btnToggleMenu.addEventListener("click", () => {
            divMenu.classList.add("hidden");
            divSansMenu.classList.remove("hidden");
        });
    </script>
</div>