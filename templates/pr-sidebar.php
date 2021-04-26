<?php
if ( ! is_active_sidebar( 'pr-sidebar' ) ) {
	return;
}
?>
<div class="widget-area">
    <?php dynamic_sidebar( 'pr-sidebar' ); ?>
</div>
