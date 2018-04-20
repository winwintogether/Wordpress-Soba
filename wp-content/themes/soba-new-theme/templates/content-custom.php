
<article <?php post_class(); ?>>
  <header>
    <?php get_template_part('templates/entry-meta-index'); ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
   <a href="<?php the_permalink(); ?>" class="blue-button">Read More</a>
</article>