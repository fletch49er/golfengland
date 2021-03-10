<?php
if ( ! is_active_sidebar( 'gt-sidebar' ) ) {
	return;
}
?>
<div class="widget-area">
    <?php dynamic_sidebar( 'gt-sidebar' ); ?>
</div>
