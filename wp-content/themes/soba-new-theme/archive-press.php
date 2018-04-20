<div id="press-archive">
    <div class="press-menu">
        <div class="featured-label">
            <h1>FEATURED</h1>
        </div>
        <div class="select-group">
            <label for="select-press">SELECT TOPIC : </label>
            <select id="select-press">
                <option value="">ALL</option>
				<?php
				$_terms = get_terms( array( 'press_category' ) );
				foreach ( $_terms as $term ) {
					?>
                    <option value="<?= $term->slug ?>"><?= $term->name ?></option>
					<?php
				}
				?>
            </select>
        </div>

    </div>

    <div class="video-content">
		<?php

		$args         = array(
			'post_type'      => 'press',
			'posts_per_page' => 8,
            "meta_query"       => array(
                array(
                    "key"   => "_soba_article_press",
                    "compare" => "NOT EXISTS",
                )
            )
		);

		$loop = new WP_Query( $args );
		?>
		<?php $i = 1; ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<?php if ( $i % 4 == 1 ) {
				echo '<div class="row">';
			} ?>
			<?php get_template_part( 'templates/press-video' ); ?>
			<?php if ( $i % 4 == 0 ) {
				echo '</div>';
			} ?>
			<?php $i ++; ?>
		<?php
		endwhile;
		$i --;
		if ( $i % 4 != 0 ) {
			echo '</div>';
		}
		wp_reset_postdata();
		?>
    </div>
    <div class="video-load-more">
        <a id="video_load_more" class="button expanded" href="#">
            <span class="static-icons">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </span>
            <span class="ajax-loading">
                <div class="circleG_1 circleG"></div>
                <div class="circleG_2 circleG"></div>
                <div class="circleG_3 circleG"></div>
            </span>
            LOAD MORE VIDEOS
        </a>
    </div>
    <div class="staff-content">
        <div class="left-area">
            <div class="image-group">
                <img src="<?php echo get_template_directory_uri() ?>/dist/images/Articles.png"
                     alt="Image Location"/>
<!--                <img class="image-circle"-->
<!--                     src="--><?php //echo get_template_directory_uri() ?><!--/dist/images/Photo1.png"-->
<!--                     alt="Image Location"/>-->
<!--                <img class="image-circle"-->
<!--                     src="--><?php //echo get_template_directory_uri() ?><!--/dist/images/Photo3.png"-->
<!--                     alt="Image Location"/>-->
<!--                <img class="image-circle"-->
<!--                     src="--><?php //echo get_template_directory_uri() ?><!--/dist/images/Photo2.png"-->
<!--                     alt="Image Location"/>-->
            </div>

        </div>
        <div class="right-area">
            <div class="content">
                <h1><span class="light-blue-color">Soba</span> in the press</h1>
                <h2>Our staff are recognized as experts in the field of recovery</h2>
                <br>
                <p class="gap"> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur.</p>
            </div>

        </div>
    </div>
    <div class="company-content">
        <div class="company-item">
            <div class="image-area"><img src="<?php echo get_template_directory_uri() ?>/dist/images/usa-today.png"
                                         alt="Image Location"/></div>
        </div>
        <div class="company-item">
            <div class="image-area"><img src="<?php echo get_template_directory_uri() ?>/dist/images/cnn.png"
                                         alt="Image Location"/></div>
        </div>
        <div class="company-item">
            <div class="image-area"><img src="<?php echo get_template_directory_uri() ?>/dist/images/9news.png"
                                         alt="Image Location"/></div>
        </div>
        <div class="company-item">
            <div class="image-area"><img src="<?php echo get_template_directory_uri() ?>/dist/images/npr.png"
                                         alt="Image Location"/></div>
        </div>
    </div>

    <div class="articles-content">
        <?php
        $args = array(
	        'suppress_filters' => true,
	        'post_type'        => "press",
	        'posts_per_page'   => 5,
	        "meta_query"       => array(
		        array(
			        "key"   => "_soba_article_press",
			        "value" => "on"
		        )
	        )
        );

        $loop = new WP_Query( $args );
        $out  = '';
        if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
	         get_template_part( 'templates/press-article' );
        endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
    <div class="article-load-more">
        <a id="article_load_more" class="button" href="#">
             <span class="static-icons">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </span>
             <span class="ajax-loading">
                <div class="circleG_1 circleG"></div>
                <div class="circleG_2 circleG"></div>
                <div class="circleG_3 circleG"></div>
             </span>
            LOAD MORE ARTICLES
        </a>
    </div>
</div>
<div id="press-video-modal">
    <div class="responsive-embed widescreen" >

    </div>
</div>
<?php the_posts_navigation(); ?>