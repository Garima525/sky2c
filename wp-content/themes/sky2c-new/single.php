<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */

get_header(); ?>

	<div class="inner-page-banner <?php echo $banner_class; ?>" id="post-<?php the_ID(); ?>" >
		<div class="innerpage_title">
			<div class="container">
				<?php /* <h1 class="section_title">Blog</h1>
				 <div class="breadcrumb"><p><?php get_breadcrumb(); ?></p></div> */ ?>
			</div>
		</div>
	</div>

	<?php while ( have_posts() ) : the_post(); ?>
	<div id="primary" class="content-area clr container post-single-content">
		<div id="content" class="site-content left-content blog-post-content-section clr" role="main">
			<article>
				<h5 class="post_date"><span><?php the_time('F, d Y') ?></span> </h5>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php
				// Display post meta
				// See functions/commons.php
				//wpex_post_meta();
				?>

				<?php
				if ( !post_password_required() ) {
				get_template_part( 'content', get_post_format() );
				} ?>
				<!-- .page-header -->
				<div class="single_post_wrapper">
					<ul class="post-meta-tags">
						<li class="author"><i class="fa fa-user-o"></i><?php the_author();?></li>
						<li class="catagory"><i class="fa fa-folder-open-o"></i><?php the_category(', ');?></li>
						<li class="readmore">&nbsp;</li>
					</ul>
				</div>
				<div class="entry clr">
					<?php the_content(); ?>
				</div>
				<div class="clear-all"></div>
			</article>
			<?php
			// Display author bio
			// See functions/commons.php
			wpex_post_author(); ?>
			<?php //comments_template(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!-- #content -->
		
		<div class="blog-post-content-sidebar">
			<?php get_sidebar(); ?>
		</div>
		
	</div>
<!-- #primary -->
<?php endwhile; ?>

<?php
$category = get_the_category(); 
//echo $category[0]->cat_ID;
if ($category[1]->cat_ID == ''){ ?>
	<script>
	jQuery('.cat-item-'+<?php echo $category[0]->cat_ID; ?>).addClass('current-cat');
	</script>
<?php } else { ?>
	<script>
	jQuery('.cat-item-'+<?php echo $category[1]->cat_ID; ?>).addClass('current-cat');
	</script>
<?php } ?>

<?php get_footer(); ?>