<?php
if ( ! is_active_sidebar( 'pga_sidebar' ) ) {
	return;
}
?>
<div class="widget-area">
    <?php dynamic_sidebar( 'pga_sidebar' ); ?>
</div>
