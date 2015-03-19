	   </div>
       </div>
 </div><!-- /.container -->

      <div class="container">      
<div class="row">
<?php if ( is_active_sidebar( 'footer1' ) ) : ?>

						<?php dynamic_sidebar( 'footer1' ); ?>

					<?php else : ?>

						<!-- This content appears if there are no widgets defined. -->
						
						<div class="alert alert-message">
						
							<!--<p><?php _e("Please activate some Widgets","fullfoto"); ?>.</p>-->
						
						</div>

					<?php endif; ?>
<?php if ( is_active_sidebar( 'footer2' ) ) : ?>

						<?php dynamic_sidebar( 'footer2' ); ?>

					<?php else : ?>

						<!-- This content appears if there are no widgets defined. -->
						
						<div class="alert alert-message">
						
							<!--<p><?php _e("Please activate some Widgets","fullfoto"); ?>.</p>-->
						
						</div>

					<?php endif; ?>
<?php if ( is_active_sidebar( 'footer3' ) ) : ?>

						<?php dynamic_sidebar( 'footer3' ); ?>

					<?php else : ?>

						<!-- This content appears if there are no widgets defined. -->
						
						<div class="alert alert-message">
						
							<!--<p><?php _e("Please activate some Widgets","fullfoto"); ?>.</p>-->
						
						</div>

					<?php endif; ?>        
</div>         
</div><!-- /.container -->
  
 </div><!-- /.wrapper -->
     <!-- FOOTER -->
      <footer>
      <div class="container">      
        <div class="footer-right pull-right text-right"><a href="#">Back to top</a></div>
        <div class="footer-left">&copy; <?php echo date('Y');?> <?php bloginfo( 'name' ) ?></div>
         </div><!-- /.container -->
      </footer>
<?php wp_footer(); ?>
</body>
</html>