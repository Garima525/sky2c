<?php
/**
 * Template Name: Blog Template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<!--Content starts-->
<article id="content">
  <div class="main">
  
    <!--Main content area starts-->
    <div class="data">
		<?php     //echo "PAge ID" .$pageid = the_permalink();
   
                $args = array( 'numberposts' => 20, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date",'order'=>"DESC");
                $postslist = get_posts( $args );
                 $i=0;
                foreach ($postslist as $post) : setup_postdata($post); $i++; ?>
                        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                       
                        <h2 class="entry-title" style="font-size:30px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                     
                            <?php the_excerpt(); ?>
                      
                       <a href="<?php the_permalink(); ?>" style="float:right; clear:both;" class="read-more" title="<?php the_title(); ?>">Read More</a></td></tr>
                       
                          <div class="clear"></div>
                          <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                  <?php endforeach; ?>
                 
	 
    </div>
    <!--Main content area ends-->
    
    <!--Sidebar starts-->
    <div class="sidebar">
    	<?php if ( is_active_sidebar( 'sidebar-contact' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-contact' ); ?>
		<?php endif; ?>      
    </div>
    <!--Sidebar ends-->
    <div class="clear"></div>
    
  </div>
</article>
<!--Content ends-->


<?php 

//get_sidebar();
get_footer();
