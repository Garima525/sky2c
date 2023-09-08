<?php
/**
 * The default template for displaying post content.
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */



/**
	Entries
**/

if ( is_singular() && is_main_query() ) { ?>
<?php $thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); ?>
<div class="blog-sec-img">
	<img src="<?php echo $thumb_url[0]; ?>" alt="" class="img-responsive" />
</div>	
<?php }

/**
	Posts
**/
else { ?>
<div class="blog-list blog-post-content-section col-xs-12 no-padding">
	<div class="blog-article-wrapper">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="blog-list-image col-xs-12 no-padding">
				<?php $thumb_id = get_post_thumbnail_id();
				$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); ?>
				<div class="blog-sec-img">
					<img src="<?php echo $thumb_url[0]; ?>" alt="" class="img-responsive" />
				</div>
			
				<div class="posted_date">
					<div class="posted_date_inner">
					<div class="col-xs-6 no-padding">
						<h3><?php the_time('d') ?></h3>
					</div>
					<div class="col-xs-6 no-padding">
						<span><?php the_time('F') ?></span>
						<span><?php the_time('Y') ?></span>
					</div>
					<div class="clear-all"></div>
					</div>
				</div>
			</div>
			
			<div class="blog-list-content col-xs-12 ">
				<div class="loop-entry-text clr">
					<?php /* <span class="blog-list-quote">&nbsp;</span> */ ?>
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<p>
					<?php if ( get_theme_mod( 'wpex_entry_content_excerpt','excerpt' ) == 'content' ) {
					the_content();
					} else {
						$wpex_readmore = get_theme_mod('wpex_blog_readmore','1') == '1' ? true : false;
						wpex_excerpt( 18, $wpex_readmore );
						
					} ?>
					</p>
					<ul class="post-meta-tags">
						<li class="author"><i class="fa fa-user-o"></i><?php the_author();?></li>
						<li class="catagory"><i class="fa fa-folder-open-o"></i><?php the_category(', ');?></li>
						<li class="readmore"><a href="<?php the_permalink()?> ">Readmore</a></li>
					</ul>
				</div>
			</div>
		</article><!-- .loop-entry -->
	</div>
</div>
<?php } ?>