<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */?>
<aside id="secondary" class="sidebar-container" role="complementary">
<div class="sidebar-inner">
<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>
		
<?php endif; ?>
<ul><?php dynamic_sidebar( 'Sidebar-Quote-form' ); ?></ul>
<ul><?php dynamic_sidebar( 'Sidebar-Toll-free-contact' ); ?></ul>
<?php /*<ul><?php dynamic_sidebar( 'Sidebar-Rate-watch' ); ?></ul> */?>
</div>
<div class="clear-all"></div>
</aside><!-- #secondary -->