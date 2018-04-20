
<div class="staff-archive-index">
    <div class="inner">
        <p class="lead">Soba’s staff is dedicated to the well-being of all of our clients and is invested in aiding individuals on their unique path toward recovery. Soba’s team of clinicians, professionals and staff come to us with an array of expertise in various disciplines and use this diversity to connect and engage with our clients. Many of our team members have been touched by addiction on a personal level and strive to help others along their journey.
            No matter what path has lead our staff members to Soba, we all come together for the common goal of saving lives.</p>
    </div>
</div>

<?php
$_terms = get_terms( array('staff_category') );

foreach ($_terms as $term) :

    $term_slug = $term->slug;
    $_posts = new WP_Query( array(
        'post_type'         => 'staff',
        'posts_per_page'    => 10, //important for a PHP memory limit warning
        'tax_query' => array(
            array(
                'taxonomy' => 'staff_category',
                'field'    => 'slug',
                'terms'    => $term_slug,
            ),
        ),
    ));

    if( $_posts->have_posts() ) :


        echo '<div class="cat-name"><h2>'. $term->name .'</h2></div>';
        while ( $_posts->have_posts() ) : $_posts->the_post();
            ?>
            <?php get_template_part('templates/content-staff', get_post_type() != 'staff' ? get_post_type() : get_post_format()); ?>

        <?php
        endwhile;

    endif;
    wp_reset_postdata();

endforeach;
?>