<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

  

  <header>

    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'post-thumbnails' ); ?></a>  

</header> <!-- end article header -->

     <section class="entry-content">

    <div class="page-header"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>

    

    <p class="meta"><?php _e("Posted", "fullfoto"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "fullfoto"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "fullfoto"); ?> <?php the_category(', '); ?>.</p>

  </section>

<article>

  <section class="post_content clearfix">

    <?php the_content( __("Read more &raquo;","fullfoto") ); ?>

  </section> <!-- end article section -->

 </article> 

  <section class="post_content clearfix">

  <footer>

    <p class="tags"><?php the_tags('<span class="tags-title">' . __("Tags","fullfoto") . ':</span> ', ' ', ''); ?></p>

    

  </footer> <!-- end article footer -->

  </section>

</article> <!-- end article -->

