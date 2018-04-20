<div class="press-item">
	<?php $image_url = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'video-thumb' ) ); ?>
	<?php $video_id = get_post_meta( get_the_ID(), '_soba_press_video_id', true ); ?>
    <?php $youtube_video_id=''; $bright_video_id=''; ?>
	<?php if ( get_post_meta( get_the_ID(), '_soba_youtube_press', 1 ) ) {
        $youtube_video_id = $video_id;
	} else if ( get_post_meta( get_the_ID(), '_soba_bright_press', 1 ) ) {
        $bright_video_id=$video_id;
	 }
	?>
    <a href="javascript:void(0)" data-youtube-id="<?=$youtube_video_id?>" data-bright-id="<?=$bright_video_id?>" data-izimodal-open="#press-video-modal" data-izimodal-transitionin="fadeInDown" data-izimodal-preventclose=""><img src="<?php echo $image_url; ?>" alt="Image Section"/></a>
    <div class="item-content">
        <time><?= get_the_date(); ?></time>
        <h3><?php the_title(); ?></h3>
    </div>
</div>