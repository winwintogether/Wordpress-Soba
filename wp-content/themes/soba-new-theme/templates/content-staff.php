<div  class="staff-listing">
		<!-- Post Thumbnail -->
		<div class="item">
			<div class="thumb">
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('staff-thumb'); // Declare pixel size you need inside the array ?>
                    <?php $video_mp4_url=get_post_meta( get_the_ID(), '_soba_staff_video_mp4_url', true );
                          $video_ogg_url=get_post_meta( get_the_ID(), '_soba_staff_video_ogg_url', true );
                          $video_webm_url=get_post_meta( get_the_ID(), '_soba_staff_video_webm_url', true );
                          if($video_mp4_url !="" || $video_ogg_url !="" || $video_webm_url !=""){ ?>
                            <video class="staff-video">
                                <?php if($video_mp4_url !=""){ ?>
                                    <source src="<?=$video_mp4_url?>" type="video/mp4">
                                <?php } ?>
                                <?php if($video_ogg_url !=""){ ?>
                                    <source src="<?=$video_ogg_url?>" type="video/ogg">
                                <?php } ?>
                                <?php if($video_webm_url !=""){ ?>
                                    <source src="<?=$video_webm_url?>" type="video/webm">
                                <?php } ?>
                            </video>
                     <?php } ?>
					</a>
				<?php else: ?>
				<img class="wp-post-image" src="<?php echo get_template_directory_uri(); ?>/dist/images/default-thumb.png">
				<?php endif; ?>
			</div>
			<!-- /Post Thumbnail -->
		
			<!-- Post Title -->
			<div class="staff-text">
				<h3 class="staff-title">
					<?php the_title(); ?>
				</h3>
				<!-- /Post Title -->
				<?php the_content();?>
			</div>
		</div>
</div>