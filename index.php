<?php get_header(); ?>

     <!-- Wrap the rest of the page in another container to center all the content. -->



	<div class="container clearfix">  

		<div class="clearfix row-fluid">  			

				<div id="main" class="span8 clearfix bg" role="main">

 <?php /* The Loop — with comments! */ ?>         

<?php while ( have_posts() ) : the_post() ?>

 

<?php /* Create a div with a unique ID thanks to the_ID() and semantic classes with post_class() */ ?>       

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

<?php /* an h2 title */ ?>                           

              
<?php if(is_page() ){ ?>

<div class="page-header"><h2><?php the_title(); ?></h2></div>

<?php } else { ?>      			

<div class="page-header"><h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'fullfoto'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></div>


<?php } ?>	

<?php /* The entry content */ ?>                 

                    <section class="entry-content">  

<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'fullfoto' )  ); ?>

<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'fullfoto' ) . '&after=</div>') ?>

                    </section><!-- .entry-content -->

<?php if(is_page() ){ ?>



<?php } else { ?>      			



<?php dc_social_share_tag(); ?>

<?php } ?>	

				<p class="entry-content clearfix"><?php the_tags('<span class="tags">' . __("Tags","fullfoto") . ': ', ', ', '</span>'); ?></p>	

						 <!-- end article footer -->

			</article>

                <!--</div> #post-<?php the_ID(); ?> -->

<?php /* Close up the post div and then end the loop with endwhile */ ?>     



<?php endwhile; ?>        

					

   	</div><?php get_sidebar(); ?>	

</div>

<?php get_footer(); ?>