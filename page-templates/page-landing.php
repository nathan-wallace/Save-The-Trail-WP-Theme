<?php
/**
 * Template Name: Landing Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 */
get_header(); ?>
     <!-- Wrap the rest of the page in another container to center all the content. -->
  <div class="container"> <div class="clearfix row-fluid"> 
<div id="main" class="span7 clearfix bg" role="main">
 <?php /* The Loop */ ?>         
<?php while ( have_posts() ) : the_post() ?>
<?php /* Create a div with a unique ID thanks to the_ID() and semantic classes with post_class() */ ?>       
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                               
<?php /* The entry content */ ?>                 
                    <!-- <div class="entry-content">  -->
<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'full-foto' )  ); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'full-foto' ) . '&after=</div>') ?>
                   <!-- </div>.entry-content -->
</div><!-- .row-fluid -->
                </div><!-- #post-<?php the_ID(); ?> -->
<?php /* Close up the post div and then end the loop with endwhile */ ?>     
<?php endwhile; ?>    

<?php get_footer(); ?>