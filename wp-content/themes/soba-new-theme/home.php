<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>



<!-- Main Featured Post -->

<?php 
$featured_query = new WP_Query(array(
    'posts_per_page' => 1,
    'cat' => 45,
));
?>


<?php while ($featured_query->have_posts()) : $featured_query->the_post();  ?>
<div class="featured">
<?= img('blog-header.png') ?>  
  <div class="inner">
  <div class="title-box">
  <?php get_template_part('templates/content-custom'); 
  ?>
  </div>
  </div>
</div>

<?php endwhile; ?>

 <?php wp_reset_postdata();?>

<!-- Secondary Featured Post -->

<?php 
$secondary_featured = new WP_Query(array(
    'posts_per_page' => 1,
    'cat' => 46,
));
?>

<?php while ($secondary_featured->have_posts()) : $secondary_featured->the_post();  ?>
<div class="secondary-featured">
  <div class="inner">
  <div class="image">
        <img src="<?php the_post_thumbnail_url(); ?> " alt="<?php the_title(); ?>">
  </div>
  <div class="content">
    <?php glgvmet_template_part('templates/content-custom');?>
  </div>
  </div>
</div>ng

<?php endwhile; ?>

<?php wp_reset_postdata();?>

<!-- Third Section Featured Post -->
<?php 
$left_align = new WP_Query(array(
    'posts_per_page' => 2,
    'cat' => 47,
));
?>

<?php while ($left_align->have_posts()) : $left_align->the_post();  ?>
    <?php get_template_part('templates/content-left'); 
  ?>
</div>

<?php endwhile; ?>

<?php wp_reset_postdata();?>

<div class="follow-us">
  <div class="inner">
  <div class="content">
    
    <h2>Follow Us</h2>  
  </div>
  </div>
</div>


<!-- Main Loop -->

<?php while (have_posts()) : the_post();  ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); 
dc
  ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
