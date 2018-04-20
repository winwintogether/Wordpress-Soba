
<?php $youtube_id = get_post_meta( get_the_ID(), '_soba_service_video_id', true ); ?>
	                
<?php if ( ! empty( $youtube_id ) ) { ?>
 <div class="page-video">
 	<div class="lazyYT" data-youtube-id="<?php echo $youtube_id ?>"></div>
 </div>
  <?php  } else { ?>
  
   <?php } ?>

<?php the_content(); ?>