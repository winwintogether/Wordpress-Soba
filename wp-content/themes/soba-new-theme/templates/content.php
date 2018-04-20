<article <?php post_class('main-loop'); ?>>
	<div class="inner">
		<div class="image">
		<img src="<?php the_post_thumbnail_url('normal-loop'); ?> " alt="<?php the_title(); ?>">
    	</div>
    	<div class="content">
    	<?php get_template_part('templates/entry-meta-index'); ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    	<a href="<?php the_permalink(); ?>" class="blue-button">Read More</a>
    </div>
   </div>
</article>