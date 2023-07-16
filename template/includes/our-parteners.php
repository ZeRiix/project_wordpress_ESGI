<div class="flex flex-wrap justify-center gap-[120px]">
    <?php foreach (esgi_get_partners() as $partner) {
        if ($partner) {
            echo '<img src="' . $partner . '" class="w-[200px] h-[200px]">';
        }
    } ?>
</div>