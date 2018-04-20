<div class="slider-container">

<div class="home-slider">
<?php 

$args = array(
    'post_type' => array( 'home-slider' ),
    'posts_per_page' => '-1',
    'orderby'                => 'menu_order',
);

$query = new WP_Query( $args ); 
if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); }?>
<?php the_post_thumbnail( 'full' ); ?>
<?php } else { ?>

<?php }
wp_reset_postdata();
 ?>

</div>

<div class="capstone">
<div class="content-call">
    <?php $header_line_one  = get_post_meta( get_the_ID(), '_soba_main_line_one', true ); ?> 
    <?php $header_line_two  = get_post_meta( get_the_ID(), '_soba_main_line_two', true ); ?> 
    <?php $link_one_title  = get_post_meta( get_the_ID(), '_soba_header_link_one', true ); ?> 
    <?php $link_one_url  = get_post_meta( get_the_ID(), '_soba_header_link_one_url', true ); ?> 
    <?php $link_two_title  = get_post_meta( get_the_ID(), '_soba_header_link_two', true ); ?> 
    <?php $link_two_url  = get_post_meta( get_the_ID(), '_soba_header_link_two_url', true ); ?> 
     <?php $link_three_title  = get_post_meta( get_the_ID(), '_soba_header_link_three', true ); ?> 
    <?php $link_three_url  = get_post_meta( get_the_ID(), '_soba_header_link_three_url', true ); ?> 
    <?php $link_four_title  = get_post_meta( get_the_ID(), '_soba_header_link_four', true ); ?> 
    <?php $link_four_url  = get_post_meta( get_the_ID(), '_soba_header_link_four_url', true ); ?> 
    <h1><?php echo $header_line_one; ?></h1>
    <p><?php echo $header_line_two; ?></p>
    <a href="#first" data-smooth-scroll data-animation-duration="1000"><?= img('scroll.png') ?></a>
</div>
</div>

<div class="slider-nav">
        <div class="inner">
        <div class="contain">
        <div class="item">
            <a href="<?php echo $link_one_url ?>">
               <?php echo $link_one_title ?>
            </a>
        </div>
        <div class="item">
           <a href="<?php echo $link_two_url ?>">
               <?php echo $link_two_title ?>
            </a>
        </div>
        <div class="item">
            <a href="<?php echo $link_three_url ?>">
               <?php echo $link_three_title ?>
            </a>
        </div>
        <div class="item last">
              <a href="<?php echo $link_three_url ?>">
               <?php echo $link_three_title ?>
            </a>
        </div>
    </div>
    </div>
    </div>
</div>
</div>
