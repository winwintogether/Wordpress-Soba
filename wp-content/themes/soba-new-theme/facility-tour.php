<?php
/**
 * Template Name: Facility Tour
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header-facility'); ?>
  <?php get_template_part('templates/content', 'facility-tour'); ?>
<?php endwhile; ?>
