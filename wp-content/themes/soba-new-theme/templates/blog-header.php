<div class="page-header single" style="background:url(  
    <?php 
   if ( has_post_thumbnail() ) {
    the_post_thumbnail_url('full');
   }else {
    echo get_template_directory_uri() , '/dist/images/wave.jpg' ;
    } 

?>) no-repeat center;background-size:cover;
">    <div class="title-section">
      <div class="updated" datetime="<?= get_post_time('c', true); ?>">BLOG<span> // </span><?= get_the_date(); ?></div>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
      </div>
</div>