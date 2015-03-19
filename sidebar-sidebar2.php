<!--<div id="sidebar1" class="fluid-sidebar sidebar span4" role="complementary">
				<section class="post_content entry-content">-->
					<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar2' ); ?>

					<?php else : ?>

						<!-- This content appears if there are no widgets defined. -->
						
						<div class="alert alert-message">
						
							<!--<p><?php _e("Please activate some Widgets","fullfoto"); ?>.</p>-->
						
						</div>

					<?php endif; ?>
				<!--</section>
				</div>-->