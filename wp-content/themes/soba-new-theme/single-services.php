<div class="treatment-wrap">
<div class="inner">
<?php get_template_part('templates/content-single', get_post_type()); ?>
</div>
<div class="previous-next">
<div class="next">
<h2><?php previous_post_link('%link'); ?></h2>
</div>
<div class="previous">
	<h2><?php next_post_link('%link'); ?></h2>
</div>
</div>
</div>