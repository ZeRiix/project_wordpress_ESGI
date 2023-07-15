<?php get_header(); ?>
<div class="w-[100%] h-[100%] relative">
    <div class="w-[1487px] h-[100%] left-[277px] top-[323px] absolute">
        <div class="w-[1487px] h-[631px] left-0 top-[274px] absolute">
            <img class="w-[1487px] h-[631px] left-0 top-0 absolute" src="<?php echo img_uri(); ?>png/10.png" />
        </div>
        <div class="w-[183px] h-[130px] left-[1146px] top-0 absolute">
            <div class="left-[127px] top-0 absolute text-slate-900 text-[27px] font-bold">CEO</div>
            <div class="left-[13px] top-[59px] absolute text-zinc-500 text-xl font-normal leading-[38px]">+33 1 53
                31 25 25</div>
            <div class="left-[5px] top-[97px] absolute text-zinc-500 text-xl font-normal leading-[38px]">
                ceo@company.com</div>
        </div>
        <div class="w-[183px] h-[130px] left-[870px] top-0 absolute">
            <div class="left-[67px] top-0 absolute text-slate-900 text-[27px] font-bold">Manager</div>
            <div class="left-[13px] top-[59px] absolute text-zinc-500 text-xl font-normal leading-[38px]">+33 1 53
                31 25 23</div>
            <div class="left-[2px] top-[97px] absolute text-zinc-500 text-xl font-normal leading-[38px]">
                info@company.com</div>
        </div>
        <div
            class="w-[365px] h-[130px] left-[414px] top-0 absolute flex-col justify-end items-end gap-[25px] inline-flex">
            <div class="text-slate-900 text-[27px] font-bold">Location</div>
            <div class="w-[415px] text-right text-zinc-500 text-xl font-normal leading-[38px]">242 Rue du Faubourg
                Saint-Antoine 75020 Paris FRANCE</div>
        </div>
    </div>
    <div class="w-[911px] h-[189px] left-0 top-0 absolute">
        <div
            class="w-[909px] h-[42px] pr-[134px] pt-[3px] left-[50px] top-[147px] absolute justify-start items-center inline-flex">
            <div class="text-zinc-500 text-[26px] font-normal leading-[42px]">A desire for a big big party or a very
                select congress? Contact us.</div>
        </div>
        <div class="w-[373px] h-[105px] pr-px left-[50px] top-0 absolute justify-center items-center inline-flex">
            <div class="text-slate-900 text-[84px] font-semibold">Contacts.</div>
        </div>
    </div>
    <div class="w-[1052px] left-[50px] top-[1360px] absolute">
        <div class="text-slate-900 text-[63px] font-semibold tracking-[3px]">Write us here</div>
        <div class="text-zinc-500 text-[26px] font-normal leading-[42px]">Go! Don’t be shy.</div>
        <div class="contact-form ml-[50px] text-zinc-400 text-xl font-normal leading-[38px]">
            <style type="text/css">
            .wpcf7-text {
                border-bottom: 1px solid rgb(161 161 170);
            }

            .wpcf7-textarea {
                border-bottom: 1px solid rgb(161 161 170);
            }
            </style>
            <?php form_contact(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>