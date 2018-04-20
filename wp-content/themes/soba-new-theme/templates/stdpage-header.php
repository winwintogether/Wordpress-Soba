<div class="page-header" style="
background:
linear-gradient(
      rgba(21, 30, 35, 0.45), 
      rgba(21, 30, 35, 0.45)
    ),
url(
    <?php 
if ( has_post_thumbnail() ) {
    the_post_thumbnail_url('full');
   }else {
    echo get_template_directory_uri() , '/dist/images/wave.jpg' ;
} 
?>) no-repeat center;background-size:cover;
">
<div class="cap">
<?php $header_two  = get_post_meta( get_the_ID(), '_soba_secondary_title', true ); ?>                   
<?php if ( ! empty( $header_two ) ) { ?>
    <h1 class="two-line"><span><?php the_title();?></span></h1>
    <h1><?php echo esc_html( $header_two ); ?></h1>
  <?php  } else { ?>
    <h1 class="two-line"><?php the_title();?></h1>
   <?php } ?>
</div>
</div>

<?php get_template_part('templates/breadcrumbs'); ?>
