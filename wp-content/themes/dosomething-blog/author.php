<?php

global $mk_options;
  $page_layout = $mk_options['archive_page_layout'];
  $loop_style = $mk_options['archive_loop_style'];
  $pagination_style = $mk_options['archive_pagination_style'];
  $image_height = $mk_options['archive_blog_image_height'];
  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));


get_header(); ?>
<div id="theme-page">
  <div class="theme-page-wrapper <?php echo $page_layout; ?>-layout  mk-grid vc_row-fluid row-fluid">
    <div class="theme-content">

      <header class="lead">
        <span>Showing</span>
        <h2>All posts by <?php echo $curauth->display_name; ?></h2>
      </header>

      <?php
        echo do_shortcode( '[mk_blog style="'.$loop_style.'" grid_image_height="'.$image_height.'" pagination_style="'.$pagination_style.'"]' );
?>
    </div>

  <?php if ( $page_layout != 'full' ) get_sidebar(); ?>
  
  </div>
</div>
<?php get_footer(); ?>
