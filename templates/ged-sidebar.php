<?php
if ( ! is_active_sidebar( 'ged-sidebar' ) ) {
	return;
}
?>
<div class="widget-area">
    <?php dynamic_sidebar( 'ged-sidebar' ); ?>
</div>
