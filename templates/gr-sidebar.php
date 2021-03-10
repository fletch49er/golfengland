<?php
if ( ! is_active_sidebar( 'gr-sidebar' ) ) {
	return;
}
?>
<div class="widget-area">
    <?php dynamic_sidebar( 'gr-sidebar' ); ?>
</div>
