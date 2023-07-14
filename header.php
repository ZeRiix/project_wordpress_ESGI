<?php
$page = get_all_pages();
?>

<html lang="fr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php echo bloginfo('name') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" src="style.css">
</head>

<body <?php body_class(); ?>>
    <div>
        <div id="divSansMenu" class="w-[100%] h-[135px] relative">
            <div class="w-[100%] h-[135px] left-0 top-0 absolute bg-white"></div>
            <button id="btnToggle" class="w-10 h-2.5 right-[100px] top-[61px] absolute">
                <div class="w-10 h-[3px] left-0 top-0 absolute bg-slate-900"></div>
                <div class="w-[21px] h-[3px] left-[19px] top-[7px] absolute bg-slate-900"></div>
            </button>
            <div class="w-[140px] h-[42px] left-[160px] top-[48px] absolute">
                <div class="w-[140px] h-[42px] left-0 top-0 absolute">
                    <img src="<?php echo img_uri(); ?>svg/logo.svg" alt="logo" />
                </div>
            </div>
            <?php wp_head(); ?>
        </div>

        <div id="divMenu" class="w-[100%] h-[820px] relative z-9999 hidden">
            <div class="w-[100%] h-[820px] left-0 top-0 absolute bg-slate-900"></div>
            <div class="w-[307px] h-[606px] left-[1456px] top-[115px] absolute">
                <div class="w-[195px] h-[88px] left-[112px] top-0 absolute">
                    <div
                        class="w-[187px] h-[5px] left-[5px] top-[83px] absolute bg-gradient-to-r from-orange-200 to-pink-400">
                    </div>
                    <a href="/" class="left-0 top-0 absolute text-white text-[70px] font-semibold" id="hom">Home</a>
                </div>
                <a href="<?php page_uri('aboutUs') ?>"
                    class="left-0 top-[104px] absolute text-white text-[70px] font-semibold" id="abt">About
                    Us</a>
                <a href="<?php page_uri('services') ?>"
                    class="left-[35px] top-[207px] absolute text-white text-[70px] font-semibold" id="ser">Services</a>
                <a href="<?php page_uri('partners') ?>"
                    class="left-[25px] top-[311px] absolute text-white text-[70px] font-semibold" id="par">Partners</a>
                <a href="/" class="left-[158px] top-[414px] absolute text-white text-[70px] font-semibold"
                    id="blo">Blog</a>
                <a href="<?php page_uri('contacts') ?>"
                    class="left-[13px] top-[518px] absolute text-white text-[70px] font-semibold" id="con">Contacts</a>
            </div>
            <button id="btnToggleMenu" class="w-[16.99px] h-[16.99px] right-[100px] top-[61px] absolute">
                <div class="w-[21px] h-[3px] left-[2.14px] top-[0.01px] absolute origin-top-left rotate-45 bg-white">
                </div>
                <div
                    class="w-[21px] h-[3px] left-[16.97px] top-[2.12px] absolute origin-top-left rotate-[135deg] bg-white">
                </div>
            </button>
            <div class="pr-px left-[160px] top-[129px] absolute justify-center items-center inline-flex">
                <div class="text-white text-xl font-extrabold tracking-wide">Or try Search</div>
            </div>
            <div class="w-[133px] h-[39.90px] left-[160px] top-[49.40px] absolute">
                <div class="w-[133px] h-[39.90px] left-0 top-0 absolute">
                    <img src="<?php echo img_uri(); ?>svg/logo.svg" alt="logo" />
                </div>
            </div>
        </div>
    </div>
    <script>
    const btnToggle = document.getElementById("btnToggle");
    const btnToggleMenu = document.getElementById("btnToggleMenu");
    const divSansMenu = document.getElementById("divSansMenu");
    const divMenu = document.getElementById("divMenu");

    const abt = document.getElementById("abt");
    const ser = document.getElementById("ser");
    const par = document.getElementById("par");
    const blo = document.getElementById("blo");
    const con = document.getElementById("con");
    const hom = document.getElementById("hom");
    </script>