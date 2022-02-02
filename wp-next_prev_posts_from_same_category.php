$post_id = $post->ID; // current post ID
$cat = get_the_category(); 
$current_cat_id = $cat[0]->cat_ID; // current category ID 

$args = array( 
    'category' => $current_cat_id,
    'orderby'  => 'post_date',
    'order'    => 'DESC',
    'posts_per_page'=> -1
);
$posts = get_posts( $args );
// get IDs of posts retrieved from get_posts
$ids = array();
foreach ( $posts as $thepost ) {
    $ids[] = $thepost->ID;
}
// get and echo previous and next post in the same category
$thisindex = array_search( $post_id, $ids );
$previd    = isset( $ids[ $thisindex - 1 ] ) ? $ids[ $thisindex - 1 ] : false;
$nextid    = isset( $ids[ $thisindex + 1 ] ) ? $ids[ $thisindex + 1 ] : false;

echo '<nav style="display: flex;flex-wrap: wrap;justify-content: space-between;margin: 15px 0 30px;">';
echo "<!--".count($ids)."-->";
if (false !== $previd ) {
    ?><a rel="prev" href="<?php echo get_permalink($previd) ?>">&larr;  Previous</a><?php
} else {
    echo '<span>&nbsp;</span>';
}
if (false !== $nextid ) {
    ?><a rel="next" href="<?php echo get_permalink($nextid) ?>">Next &rarr;</a><?php
} else {
    echo '<span>&nbsp;</span>';
}
echo '</nav>';
wp_reset_query();
