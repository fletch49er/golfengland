<?php
if ( ! is_active_sidebar( 'pga-sidebar' ) ) {
	return;
}
?>
<div class="widget-area">
    <?php dynamic_sidebar( 'pga-sidebar' ); ?>
</div>
