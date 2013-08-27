<?php /*?>
<h2 id="authors">Authors</h2>
<ul>
<?php
wp_list_authors(
  array(
    'exclude_admin' => false,
  )
);
?>
</ul>
<?php */?>


<h2 id="pages">Pages</h2>
<?php /*?>
<ul>
<?php
// Add pages you'd like to exclude in the exclude here
wp_list_pages(
  array(
    'exclude' => '',
    'title_li' => '',
  )
);
?>
</ul>
<?php */?>
<?php bones_main_nav(); ?>

<h2 id="posts">Announcements</h2>
<ul>
<?php
// Add categories you'd like to exclude in the exclude here
$original_query = $wp_query;  // saving query for later

$cats = get_categories('exclude=');
foreach ($cats as $cat) {
  //echo "<li><h3>".$cat->cat_name."</h3>";
  //echo "<ul>";
  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
  while(have_posts()) {
    the_post();
    $category = get_the_category();
    // Only display a post link once, even if it's in multiple categories
    if ($category[0]->cat_ID == $cat->cat_ID) {
      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
    }
  }
  //echo "</ul>";
  //echo "</li>";
}

$wp_query = $original_query; //returning query 
wp_reset_postdata(); // reset the query 
?>
</ul>