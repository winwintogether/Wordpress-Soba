<div class="section-full" id="first">
	<div class="inner">
	<div class="left" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
		<?= img('winding-way.jpg') ?>
	</div>
	<div class="right">
		<div class="blue-bg">
			<h1>Welcome to SOBA MALIBU</h1>
			<h3>Long-term &amp; Insurance based, therapeutic program that works.</h3>
			<p>We provide individual, one-on-one therapy with renowned therapists who are fully versed in treating the underlying causes and conditions of your addiction. Our professional staff will assist you by providing the necessary tools to manage your life and address the issues that keep you from a better tomorrow.</p>
		</div>
		<div class="greg-video">
			<?= img('greg.jpg') ?>
			<div class="play-button">

                <a href="javascript:void(0)" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown" data-izimodal-preventclose=""><?= img('play-meet.png') ?></a>
            </div>
		</div>
	</div>
	</div>
</div>

<div class="section-mid">
	<div class="inner" data-equalizer data-equalize-on="tablet">
	<div class="left" data-equalizer-watch>

<h1>Treatment 
to fit your life</h1>
<h2>Offering a Full Continuum of Personal Care</h2>
<p>At The SOBA Recovery Center, when we treat the underlying psychological disorders and the symptoms of addiction, we live by the creed that “one size DOES NOT fit all.” The bottom line is we provide treatment modalities that work for you or your loved one. Our addiction treatment center is individualized, meaning we create a custom plan for you.</p>
	</div>
	<div data-aos="fade-left" class="right" data-equalizer-watch data-aos-once="true">
		<?= img('overlooking-water.jpg') ?>
	</div>
	</div>
</div>

<div class="services-section">
<div class="inner">

<?php 
	$args = array(
		'post_type'              => array( 'services' ),
		'order'                  => 'ASC',
		'orderby'                => 'menu_order',
	);
	$query = new WP_Query( $args );
	?>
	<ul class="menu icons icon-top expanded" data-responsive-accordion-tabs="tabs large-tabs" id="example-tabs">
	<?php if ( $query->have_posts() ) : $post = $posts[0]; $c=0;?>
	
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<?php $slug =  $post->post_name;  ?>
	<li class="<?php echo $slug; ?> tabs-title <?php $c++; if($c == 1) { echo ' is-active'; } ?>">
		<a href="#<?php echo $slug; ?>" aria-selected="true">
		<span class="icon">
			<img src="<?php echo get_post_meta( get_the_ID(), '_soba_slider_tab_icon', true ); ?>" alt="<?php the_title(); ?>">
		</span>
		<?php  ?><?php the_title(); ?>
	</a></li>
	<?php endwhile; ?>
	

	<?php else : ?>
		<p><?php _e( 'Nothing Here - Please Set Featured Pages' ); ?></p>
	<?php endif; ?>
	</ul>
	<?php wp_reset_postdata(); ?>
	
	<?php 
	$args2 = array(
		'post_type'              => array( 'services' ),
		'order'                  => 'ASC',
		'orderby'                => 'menu_order',
	);
	$query_2 = new WP_Query( $args2 );
	?>

	<div class="tabs-content" data-tabs-content="example-tabs" data-aos-once="true">
		<?php if ( $query_2->have_posts() ) : $post = $posts[0]; $c=0; ?>

		<?php while ( $query_2->have_posts() ) : $query_2->the_post(); ?>
		<?php 
		$slug =  $post->post_name;
		$slider_callout = get_post_meta( get_the_ID(), '_soba_slider_home_callout', true ); 
		$slider_text = get_post_meta( get_the_ID(), '_soba_slider_ex_box', true );
		?>
		<div class="tabs-panel <?php $c++; if($c == 1) { echo ' is-active'; } ?>" id="<?php echo $slug; ?>">
			<div class="service-item">
				<div class="left">
					<div class="blue-bg">
					<h1><?php the_title(); ?></h1>
					<h2><?php echo $slider_callout; ?></h2>
					</div>
					<?php the_post_thumbnail('featured-service') ?>
				</div>
				<div class="right">
					<?php  $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_soba_slider_home_featured_id', 1 ), 'featured-service-two' ); ?>
					<?php echo $image; ?>
					<?php echo esc_html($slider_text); ?>
					<div class="slide-text">
					<?php echo wpautop( get_post_meta( get_the_ID(), '_soba_slide_content', true ) ); ?>
					<a class="learn-more" href="<?php the_permalink(); ?>">Learn More</a>
					</div>

				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php else : ?>
		<p><?php _e( 'Nothing Here - Please Set Featured Pages' ); ?></p>
		<?php endif; ?>
	</div>
	<?php wp_reset_postdata(); ?>

</div>
</div>

<div class="callout-two">
	<div class="inner">
		<h2>We are <span>individualized</span> care experts.</h2>
		<p>Our expert team is committed to helping develop a customized program to insure your recovery experience is life-changing. The SRC treatment program is the only affordable program to offer such a high quality of care with so many therapies, from renowned therapists. We do not claim to have a “cure”, but we do believe in providing you the necessary tools and support in a comfortable, ocean front setting in sun-drenched Malibu, California to insure your sustained and ongoing recovery at a price that is affordable. </p>
		<a href="#" class="blue-button">Call Us Now For A Confidential Assessment</a>
	</div>
</div>

<div class="services-slider">
	<?php 
	$args = array(
		'post_type'              => array( 'page' ),
		'order'                  => 'ASC',
		'orderby'                => 'menu_order',
		 'meta_query'             => array(
			array(
				'key'     => '_soba_is_featured',
				'value'   => 'on',
			),
		),
	);
	$query = new WP_Query( $args );
	?>

	<?php if ( $query->have_posts() ) : ?>


	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php $featured_title  = get_post_meta( get_the_ID(), '_soba_featured_title', true ); ?>    
		<div class="item">
			<div class="content">
				
				<?php $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_soba_home_featured_img_id', 1 ), 'slider-thumb' ); ?>
				
				<?php if ( get_post_meta($post->ID, '_soba_home_featured_img_id', true) ) { ?>
				<a href="<?php the_permalink(); ?>"><?php echo $image ?></a>
				<?php } else { ?>
				<?php the_post_thumbnail( 'slider-thumb' ); ?>
				<?php } ?>

				<?php if ( get_post_meta($post->ID, '_soba_featured_title', true) ) { ?>
				<h4><a href="<?php the_permalink(); ?>"><?php echo $featured_title;?></a></h4>
				<?php } else { ?>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
				<?php } ?>
				<?php the_excerpt(); ?>
			</div>
		</div>
	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php _e( 'Nothing Here - Please Set Featured Pages' ); ?></p>
	<?php endif; ?>
</div>

<div class="clients-section">
	<div class="outer">
	<div class="left">
		<a href="javascript:void(0)" data-izimodal-open="#testimonials-modal" data-izimodal-transitionin="fadeInDown" data-izimodal-preventclose=""><?= img('video-thumb.png') ?></a>
	</div>
	<div class="right">
	<h2>What Clients Say About SOBA:</h2>
	<p>“ I couldn't fathom having a life this good.  Today I have a fulltime job, I support myself, I wouldnt have been able to take care of myself without this program. ”<br>
<strong>-Kasey, Ann Arbor MI</strong></p>
<a href="#" class="blue-button">More Testimonials</a>
	</div>
	</div>

</div>

<?php get_template_part('templates/videos-home'); ?>

<div id="modal">
	<div class="responsive-embed widescreen">
			<div style="position: relative; display: block;"><div style="padding-top: 50%;">
				<iframe src="//players.brightcove.net/5704890279001/S1av60ZEM_default/index.html?videoId=5705636695001" allowfullscreen webkitallowfullscreen mozallowfullscreen 
style="position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; width: 100%; height: 100%;"></iframe></div>
  		</div>
</div>

<div id="testimonials-modal">
	<div class="responsive-embed widescreen">
		<iframe src="https://player.vimeo.com/video/68774175?autoplay=0&title=0&byline=0&portrait=0" width="740" height="404" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
</div>
