<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="wrap">

	<h2><?php _e( 'Justified Gallery Settings', DGWT_JG_DOMAIN ); ?></h2>

<?php $settings->show_navigation(); ?>
	<?php $settings->show_forms(); ?>

</div>