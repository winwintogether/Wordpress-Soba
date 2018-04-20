 <div class="off-canvas position-right" id="offCanvas" data-off-canvas data-transition="overlap">

   <div class="close-me">
    <a href="javascript:void(0)" data-toggle="offCanvas"><?= img('close-button.png') ?></a>
   </div>
   <?php echo'
    <div class="top-bar-left">';
        wp_nav_menu(array(
            'container' => false,
            'menu' => __( 'Top Bar Menu', 'sage' ),
            'menu_class' => 'dropdown menu',
            'theme_location' => 'topbar_menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s vertical menu drilldown" data-drilldown>%3$s</ul>',
            //Recommend setting this to false, but if you need a fallback...
            'fallback_cb' => 'f6_topbar_menu_fallback',
            'walker' => new F6_TOPBAR_MENU_WALKER(),
        ));
    echo'
    </div>
';
?>
<div class="social-contact">

<div class="social-icons">
<a href="<?php echo soba_get_option( 'fb_url' ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></i></a>
<a href="<?php echo soba_get_option( 'twitter_url' ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></i></a>
<a href="<?php echo soba_get_option( 'ig_url' ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
</div>

<div class="call-us">
    <p><span>CALL</span> <a href="tel:18665476451">#866-547-6451</a></p>
</div>

</div>
</div>


<!-- Start Off Canvas -->
<div class="off-canvas-content" data-off-canvas-content>
<div class="grad-sep"></div>
<div class="site-nav">
    <div class="inner">
    <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?= img('logo.svg'); ?></a></div>

    <div class="menu-toggle"> 
    <div class="phone">
    <h2><i class="fa fa-phone" aria-hidden="true"></i>
(866) 547-6451</h2>
    </div>
    <a class="toggle-menu" href="javascript:void(0)" data-toggle="offCanvas">
       <span>Menu</span><?= img('menu-icon.svg') ?>
    </a>
    </div>
    </div> 
</div>
<?php if  ( is_front_page()) { ?>

<?php get_template_part('templates/home-slider'); ?>

<?php } elseif (is_post_type_archive('staff')) { ?>

<?php get_template_part('templates/staff-header'); ?>

<?php } elseif (is_post_type_archive('locations')) { ?>

<?php get_template_part('templates/locations-header'); ?>

<?php } elseif (is_tax('staff_category')) { ?>

<?php get_template_part('templates/staffcat-header'); ?>


<?php } elseif (is_home()) { ?>

<div class="page-header" style="
background:url(
    <?php 

    echo get_template_directory_uri() , '/dist/images/blog-home-bg.png' ;
?>) no-repeat center;background-size:cover;
">
<h1><span>Blog</span></h1>
</div>

<?php } elseif (is_singular( 'post' )) { ?>

<?php get_template_part('templates/blog-header'); ?>

<?php } elseif (is_singular( 'services' )) { ?>

<?php get_template_part('templates/services-header'); ?>

<?php } elseif (is_post_type_archive('press')) { ?>

<?php get_template_part('templates/press-header'); ?>

<?php } else { ?>

<?php get_template_part('templates/stdpage-header'); ?>

<?php } ?>  

<?php wp_reset_query(); ?>




