//in function.php
function custom_posts($query){
  if (is_category(121)) {
    $query->set('posts_per_page', 25);
  }
}
add_action('pre_get_posts', 'custom_posts');
