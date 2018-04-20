<div class="section-one">
	<div class="left">
		<?= img('unique_healing.jpg') ?>
<div class="content">
<h2>A Unique<br>
Healing Experience.</h2>
<p>At The SOBA Recovery Center, when we treat the underlying psychological disorders and the symptoms of addiction, we live by the creed that “one size DOES NOT fit all.” The bottom line is we provide treatment modalities that work for you or your loved one. Our addiction treatment center is individualized, meaning we create a custom plan for you.</p>
<div class="button-cont">
<a class="blue-button" href="#">Explore Our Individualized Treatment</a>
</div>
</div>
	</div>
	<div class="right">
	<div class="mobile-only">
<?= img('treatment_family.jpg') ?>
</div>
	<div class="content">
		<h2>Holistic &amp; Affordable<br>
Treatment For Addiction.</h2>
<p>At SRC, we offer so many holistic therapies because we’re determined to achieve breakthroughs in order to heal you in mind, body, and spirit. SOBA clinicians are highly experienced in treating the underlying issues that lead to dependency on drugs, alcohol, and other addictive behaviors. SOBA also offers diverse types of holistic treatment which include but not limited to, surf therapy, sweat lodge, neurofeedback, and a host of others modalities.
 </p>
<div class="button-cont">
<a class="blue-button" href="#">Explore Our Holistic Treatment</a>
</div>
</div>
<div class="large-desktop">
<?= img('treatment_family.jpg') ?>
</div>
	</div>
</div>

<div class="callout-one">
	<div class="inner">
		<h2>Our <span>compassionate</span> treatment advisors are standing by to help.</h2>
		<a class="phone-btn" href="tel:18665476451"># (866) 547-6451</a>
		<p>Insurance Accepted</p>
	</div>
</div>

<div class="two-col-images">
	<div class="content">
		<div class="box">
			<h2>Are <strong>you</strong> struggling with addiction?</h2>
			<p>Find out more about our admissions and individualized treatment services.</p>
			<a href="http://dev.sobamalibu.com/seeking-help-for-yourself/" class="blue-button">For Yourself</a>
		</div>
		<div class="box last">
			<h2>Addiction help for a <strong>Loved One</strong> ?</h2>
			<p>We’re here to help guide you through the process of finding the highest quality treatment.</p>
			<a class="blue-button" href="http://dev.sobamalibu.com/seeking-help-loved-one/">For A Loved One</a>
		</div>
	</div>
	<div class="left">
		
	</div>
	<div class="right last">
	
	</div>
</div>

<div class="callout-two">
	<div class="inner">
		<h2>We are <span>individualized</span> care experts.</h2>
		<p>Our expert team is committed to helping develop a customized program to insure your recovery experience is life-changing. The SRC treatment program is the only affordable program to offer such a high quality of care with so many therapies, from renowned therapists. We do not claim to have a “cure”, but we do believe in providing you the necessary tools and support in a comfortable, ocean front setting in sun-drenched Malibu, California to insure your sustained and ongoing recovery at a price that is affordable. </p>
		<a href="#" class="blue-button">View All Treatment Programs</a>
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
		<a class="desktop" data-open="client-video" href="javascript:void(0)"><?= img('video-thumb.png') ?></a>
		<div class="responsive-embed mobile">
		<iframe src="https://player.vimeo.com/video/68774175?autoplay=0&title=0&byline=0&portrait=0" width="740" height="404" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>
	<div class="right">
	<h2>What Clients Say About SOBA:</h2>
	<p>“ I couldn't fathom having a life this good.  Today I have a fulltime job, I support myself, I wouldnt have been able to take care of myself without this program. ”<br>
<strong>-Kasey, Ann Arbor MI</strong></p>
<a href="#" class="blue-button">More Testimonials</a>
	</div>
	</div>

<div class="reveal" id="client-video" aria-labelledby="ClientVideo" data-reset-on-close="true" data-reveal>
		<div class="responsive-embed">
			<iframe src="https://player.vimeo.com/video/68774175?autoplay=0&title=0&byline=0&portrait=0" width="740" height="404" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
  		</div>
	</div>
</div>