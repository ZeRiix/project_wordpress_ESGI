<?php get_header(); ?>

<main class="min-h-[calc(100vh-380px)] pt-[135px] mx-auto bg-slate-900">
    <section class="max-w-[1050px] mt-[40px] xl:mt-[80px] px-[30px] lg:px-[50px] xl:px-[150px] pb-[65px] xl:pb-[130px] flex flex-col gap-[50px]">
        <h1 class="text-4xl lg:text-6xl xl:text-8xl font-semibold text-white">404 Error</h1>
    
        <p class="mb-[10px] text-xl lg:text-2xl xl:text-3xl text-white">The page you were looking for couldn't be found.<br>Maybe try a search?</p>
    
        <div class="relative z-0">
            <?php get_search_form(); ?>
        </div>
    </section>
</main>

<script>
    const header = document.getElementById("header");
    const burgerLines = document.querySelectorAll(".burger-line");
    const logo = document.getElementById("logo");

    header.classList.add("!bg-slate-900");
    burgerLines.forEach(burgerLine => {
        burgerLine.classList.add("!bg-white");
    });
    logo.src = "<?php echo img_uri(); ?>svg/logo-white.svg";
</script>

<style type="text/css">
    .searchform input[name="s"] {
        width: 100%;
        padding-bottom: 8px;
        outline: none;
        color: white;
        border-bottom: 2px solid #4a5568;
        background-color: transparent;
    }

    .searchform input[type="submit"] {
        position: absolute;
        right: 0;
        cursor: pointer;
        /* hide text */
        text-indent: -9999px;
        /* add icon */
        background-image: url('https://nas-mat.synology.me/hosted-img/icons/search.svg');
        background-repeat: no-repeat;
        background-position: center;
        width: 16px;
        height: 16px;
    }
</style>

<?php get_footer(); ?>