<?php $taxonomy = get_queried_object(); ?>

<div class="page-header" style="
background:url(
    <?php 

    echo get_template_directory_uri() , '/dist/images/clinical.jpg' ;
?>) no-repeat center;background-size:cover;
">
<h1 class="two-line"><span>Staff</span></h1>
<h1><?php echo $taxonomy->name; ?></h1>


<div class="header-nav">

      <?php wp_nav_menu(array(
            'container' => false,
            'menu' => __( 'Top Bar Menu', 'sage' ),
            'menu_class' => 'menu',
            'theme_location' => 'staff_navigation',
            'items_wrap'      => '<ul id="%1$s" class="vertical medium-horizontal menu align-center">%3$s</ul>',
        ));
        ?>

</div>

</div>