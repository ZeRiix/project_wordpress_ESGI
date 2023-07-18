<?php get_header(); ?>
<div class="h-[200px]">
</div>
<div class="flex flex-col">
    <label class="font-semibold" for="search">Search</label>
    <input id="search" class="border-b-[1px] pb-[10px] mt-[25px] focus:outline-none" type="text"
        placeholder="Type to search">
    <svg id="search-icon" class="absolute top-[290px] right-0" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
        viewBox="0 0 16 17" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M12.6656 10.7188L15.7812 13.8344C16.0719 14.1281 16.0719 14.6031 15.7781 14.8969L14.8938 15.7812C14.6031 16.075 14.1281 16.075 13.8344 15.7812L10.7188 12.6656C10.5781 12.525 10.5 12.3344 10.5 12.1344V11.625C9.39688 12.4875 8.00937 13 6.5 13C2.90937 13 0 10.0906 0 6.5C0 2.90937 2.90937 0 6.5 0C10.0906 0 13 2.90937 13 6.5C13 8.00937 12.4875 9.39688 11.625 10.5H12.1344C12.3344 10.5 12.525 10.5781 12.6656 10.7188ZM2.5 6.5C2.5 8.7125 4.29063 10.5 6.5 10.5C8.7125 10.5 10.5 8.70938 10.5 6.5C10.5 4.2875 8.70938 2.5 6.5 2.5C4.2875 2.5 2.5 4.29063 2.5 6.5Z"
            fill="#969696" />
    </svg>
    <button onclick="submit()">Rechercher</button>
</div>
<script>
const search = document.querySelector('#search');

function submit() {
    document.location.href = window.location.hostname + '/?s=' + search.value;
}
</script>
<?php

$posts = [];
$recent_posts = get_recent_post();
$categories = get_list_categories();

if (isset($_GET['category'])) {
    if (isset($GET_['page_blog'])) {
        $posts = get_post_by_category($_GET['category'], $_GET['page_blog']);
    } else {
        $posts = get_post_by_category($_GET['category'], 1);
    }
} else if (isset($_GET['page_blog'])) {
    $posts = get_post_per_page($_GET['page_blog']);
} else {
    $posts = get_post_per_page(1);
}

echo '<br/><strong>per_page</strong><br/>';

foreach ($posts as $post) {
    echo '<h3>' . $post['title'] . '</h3>';
    echo '<p>' . $post['content'] . '</p>';
    if (count($post['category'])) {
        echo '<p>Category: ';
        foreach ($post['category'] as $category) {
            echo $category . ' ';
        }
        echo '</p>';
    }
    echo '<a href=' . $post['permalink'] . '>Lire la suite</a>';
    echo '<br>';
}

echo 'Pages:';
if (nb_page(get_nb_post()) > 1) {
    for ($i = 0; $i < nb_page(get_nb_post()); $i++) {
        echo '<a href="' . get_current_uri() . '&page_blog=' . $i + 1 . '">' . $i + 1 . '</a>';
    }
} else {
    echo '<a href="' . get_current_uri() . '&page_blog=1">1</a>';
}

echo '<br/><strong>recent post</strong><br/>';
foreach ($recent_posts as $post) {
    echo '<a href=' . $post['permalink'] . '>';
    echo '<h3>' . $post['title'] . '</h3>';
    echo '<p>' . $post['content'] . '</p>';
    echo '<time>' . $post['date'] . '</time>';
    echo '<br>';
    echo '</a>';
}
?>
<?php get_footer(); ?>