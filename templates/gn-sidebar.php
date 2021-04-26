<?php
if ( ! is_active_sidebar( 'gn-sidebar' ) ) {
	return;
}
?>
<div class="widget-area">
    <?php dynamic_sidebar( 'gn-sidebar' ); ?>
</div>
