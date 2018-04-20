<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js" lang="en" dir="ltr">
<?php get_template_part('templates/head'); ?>

<body <?php body_class(); ?>>

<?php
do_action('get_header');
get_template_part('templates/header');
?>
<div class="wrap" role="document">
    <div class="content">
        <main class="main">
            <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
                <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.content -->
</div><!-- /.wrap -->
<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
?>
<script>
    (function ($) {
        $(document).foundation();
    })(jQuery);
</script>

<script src="//players.brightcove.net/5704890279001/S1av60ZEM_default/index.min.js"></script>

</body>
</html>

