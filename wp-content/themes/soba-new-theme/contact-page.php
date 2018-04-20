<?php
/**
 * Template Name: Contact Page
 */
?>
<div class="standard-page">
<div class="inner">
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'contact'); ?>
<?php endwhile; ?>
</div>
</div>