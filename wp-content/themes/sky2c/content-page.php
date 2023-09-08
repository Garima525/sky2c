<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<!--Main content area starts-->
    <div class="data">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		twentyfourteen_post_thumbnail();
		the_title( '<div class="entry-header"><h1 class="entry-title">', '</h1></div><!-- .entry-header -->' );
	?>

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</div><!-- #post-## -->
 </div>
    <!--Main content area ends-->