<div class="flex flex-wrap justify-center gap-[120px]">
    <?php foreach (esgi_get_partners() as $partner) {
        if ($partner != false || $partner !== "") {
            echo '<img src="' . $partner . '" width="200">';
        }
    } ?>
</div>