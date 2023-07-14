<div class="w-[100%] h-[397px] relative">
    <div class="w-[100%] h-[397px] left-0 top-0 absolute bg-slate-900"></div>
    <div class="pr-[303px] left-[159px] top-[296px] absolute justify-start items-center inline-flex">
        <div class="text-white text-[15px] font-normal">2022 Figma Template by ESGI</div>
    </div>
    <div class="w-[70.31px] h-5 right-[100px] top-[297px] absolute">
        <img class="w-5 h-5 left-[-0px] top-0 absolute" src="<?php echo img_uri(); ?>svg/facebook.svg" />
    </div>
    <div class="w-[70.31px] h-5 right-[160px] top-[297px] absolute">
        <img class="w-5 h-5 left-[-0px] top-0 absolute" src="<?php echo img_uri(); ?>svg/linkedin.svg" />
    </div>
    <div class="w-[183px] h-[137px] right-[400px] top-[90px] absolute">
        <div class="left-[97px] top-[7px] absolute text-white text-xl font-bold">Manager</div>
        <div class="left-[12px] top-[59px] absolute text-white text-xl font-normal leading-[38px]">+33 1 53 31 25 23
        </div>
        <div class="left-[47px] top-[99px] absolute text-white text-xl font-normal leading-[38px]">info@esgi.com</div>
    </div>
    <div class="w-[183px] h-[137px] right-[50px] top-[90px] absolute">
        <div class="left-[141px] top-[7px] absolute text-white text-xl font-bold">CEO</div>
        <div class="left-[13px] top-[59px] absolute text-white text-xl font-normal leading-[38px]">+33 1 53 31 25 25
        </div>
        <div class="left-[5px] top-[99px] absolute text-white text-xl font-normal leading-[38px]">ceo@company.com</div>
    </div>
    <div class="w-[233.33px] h-[70px] left-[154px] top-[75px] absolute">
        <div class="w-[233.33px] h-[70px] left-0 top-0 absolute"></div>
    </div>
</div>
<script>
btnToggle.addEventListener("click", () => {
    divSansMenu.classList.add("hidden");
    divMenu.classList.remove("hidden");
});

btnToggleMenu.addEventListener("click", () => {
    divMenu.classList.add("hidden");
    divSansMenu.classList.remove("hidden");
});
</script>
<?php wp_footer(); ?>
</body>

</html>