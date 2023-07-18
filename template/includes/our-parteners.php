<div class="flex flex-wrap justify-center gap-[120px]">
    <?php foreach (esgi_get_partners() as $partner) {
        if ($partner) {
            echo '<img src="' . $partner . '" class="h-full max-h-[100px]">';
        }
    } ?>
</div>