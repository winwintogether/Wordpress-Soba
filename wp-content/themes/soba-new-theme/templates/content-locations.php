<?php $location_url  = get_post_meta( get_the_ID(), '_soba_url_locations', true ); ?>    
<?php $location_text  = get_post_meta( get_the_ID(), '_soba_url_text', true ); ?>        
<div class="facility-left">
	<div class="inner">
	<div class="title-box">
		<h3>Soba living <span>@</span></h3>
		<h2><?php the_title();?></h2>
		<?php the_content(); ?>
		<a href="<?php echo $location_url; ?>" class="blue-button"><?php echo $location_text; ?></a>
	</div>

<?php cmb2_output_file_list( 'location_gallery', 'gallery-thumb' ); ?>
</div>
</div>
