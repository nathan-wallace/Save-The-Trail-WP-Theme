<?php get_header(); ?>
			  
	<div class="container clearfix">  
		<div class="clearfix row-fluid">  				
				<div id="main" class="span8 clearfix bg" role="main">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
						
							<?php the_post_thumbnail( 'post-thumbnails' ); ?>
							
							<div class="page-header"><h1><?php the_title(); ?></h1></div>
							
							<p class="meta"><?php _e("Posted", "fullfoto"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "fullfoto"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "fullfoto"); ?> <?php the_category(', '); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="entry-content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						
			<section class="entry-content clearfix" >
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","fullfoto") . ':</span> ', ' ', '</p>'); ?>
							</section>
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","fullfoto"); ?></a>
							<?php } ?>
							
						 <!-- end article footer -->
					
					</article> <!-- end article -->
					<div class="entry-content">
					<?php comments_template('',true); ?>
					</div>
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "fullfoto"); ?></h1>
					    </header>
					    <section class="entry-content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "fullfoto"); ?></p>
					    </section>
					    <!--<footer>
					    </footer>-->
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->
</div>
<?php get_footer(); ?>