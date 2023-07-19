<?php
$page = get_all_pages();
?>

<html lang="fr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <title><?php echo bloginfo('name') ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" src="style.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header" class="fixed z-50 w-full bg-white">
        <div id="divSansMenu"
            class="w-[100%] h-[135px] px-[30px] lg:px-[50px] xl:px-[150px] flex items-center justify-between">
            <a href="/" class="w-[140px] h-[42px]">
                <img id="logo" src="<?php echo esgi_get_site_logo()['logo']; ?>" alt="logo" />
            </a>

            <button id="btnToggle" class="p-[10px] flex flex-col items-end gap-[4px]">
                <div class="burger-line w-[40px] h-[3px] bg-slate-900"></div>

                <div class="burger-line w-[20px] h-[3px] bg-slate-900"></div>
            </button>
        </div>

        <div id="divMenu"
            class="fixed z-50 top-[-950px] left-0 w-full px-[30px] pb-[80px] lg:pb-[160px] lg:px-[50px] xl:px-[150px] bg-slate-900 transition-all duration-500">
            <div class="w-[100%] h-[135px] flex items-center justify-between">
                <a href="/" class="w-[140px] h-[42px]">
                    <img src="<?php echo esgi_get_site_logo()['logo_white']; ?>" alt="logo" />
                </a>

                <button id="btnToggleMenu" class="relative w-[16.99px] h-[16.99px]">
                    <div
                        class="w-[21px] h-[3px] left-[2.14px] top-[0.01px] absolute origin-top-left rotate-45 bg-white">
                    </div>

                    <div
                        class="w-[21px] h-[3px] left-[16.97px] top-[2.12px] absolute origin-top-left rotate-[135deg] bg-white">
                    </div>
                </button>
            </div>

            <div class="flex justify-end">
                <nav>
                    <ul class="flex flex-col items-end">
                        <li>
                            <a href="/" class="text-white text-[20px] lg:text-[35px] xl:text-[70px] font-semibold">Home</a>

                            <div class="opacity-0 w-full h-[4px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transition-all duration-500"></div>
                        </li>

                        <li>
                            <a href="<?php page_uri('aboutUs') ?>" class="text-white text-[20px] lg:text-[35px] xl:text-[70px] font-semibold">About Us</a>
                            <div class="opacity-0 w-full h-[4px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transition-all duration-500"></div>
                        </li>

                        <li>
                            <a href="<?php page_uri('services') ?>" class="text-white text-[20px] lg:text-[35px] xl:text-[70px] font-semibold">Services</a>
                            <div class="opacity-0 w-full h-[4px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transition-all duration-500"></div>
                        </li>

                        <li>
                            <a href="<?php page_uri('blog/list') ?>" class="text-white text-[20px] lg:text-[35px] xl:text-[70px] font-semibold">Blog</a>
                            <div class="opacity-0 w-full h-[4px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transition-all duration-500"></div>
                        </li>

                        <?php $pass = false;
                        foreach (esgi_get_partners() as $key => $value) {
                            if ($value != false || $value !== "") {
                                $pass = true;
                            }
                        }
                        if ($pass) { ?>
                        <li>
                            <a href="<?php page_uri('partners') ?>" class="text-white text-[20px] lg:text-[35px] xl:text-[70px] font-semibold">Partners</a>
                            <div class="opacity-0 w-full h-[4px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transition-all duration-500"></div>
                        </li>
                        <?php } ?>

                        <li>
                            <a href="<?php page_uri('contacts') ?>" class="text-white text-[20px] lg:text-[35px] xl:text-[70px] font-semibold">Contacts</a>
                            <div class="opacity-0 w-full h-[4px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transition-all duration-500"></div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <script>
    const btnToggle = document.getElementById("btnToggle");
    const btnToggleMenu = document.getElementById("btnToggleMenu");
    const divSansMenu = document.getElementById("divSansMenu");
    const divMenu = document.getElementById("divMenu");
    </script>

    <style type="text/css">
        li:hover div {
            opacity: 1;
        }
    </style>