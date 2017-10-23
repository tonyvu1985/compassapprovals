<?php
/**
 * The footer template
 *
 * @package WordPress
 * @subpackage The Architect
 * @since The Architect 1.0
 */
?>
			<footer class="footer" role="contentinfo">
				<div id="inner-footer" class="wrap">
					<?php if ( is_active_sidebar( 'footer' ) ) : ?>

						<?php dynamic_sidebar( 'footer' ); ?>

					<?php endif; ?>

					<div class="cf"></div>
				</div>
			</footer>

		</div><!-- /#container -->
                <div id="member-logos">
                    <img src="http://www.compassapprovals.com.au/wp-content/uploads/2017/10/rs-hia-member.jpg" alt="rs hia member" />
                    <img src="http://www.compassapprovals.com.au/wp-content/uploads/2017/10/master-builder-ass.jpg" alt="master builder ass" />
                    <img src="http://www.compassapprovals.com.au/wp-content/uploads/2017/10/building-professionals-board.jpg" alt="building professionals board" />
                    <img src="http://www.compassapprovals.com.au/wp-content/uploads/2017/10/aibs.jpg" alt="aibs" />
                </div>
		<div class="copy">
			<?php if ( ot_get_option('wpl_copyright') ) { 
				echo ot_get_option('wpl_copyright'); 
			} ?>

			<!--<?php _e('Designed by', 'thearchitect-wpl'); ?> <a href="https://wplook.com/theme/architect-wordpress-theme/<?php if (ot_get_option('wpl_affiliate')) { echo "?ref="; echo ot_get_option('wpl_affiliate'); } else { echo "?utm_source=Footer-URL&utm_medium=link&utm_campaign=The-Architect";} ?>" title="<?php _e('WPlook', 'thearchitect-wpl'); ?>" target="_blank">WPlook Studio</a> -->
		</div>

		<?php if ( ot_get_option('wpl_google_analytics_tracking_code') ) {
			// Google Analytics Tracking Code
			echo ot_get_option('wpl_google_analytics_tracking_code');
		} ?>
		<?php wp_footer(); ?>
	</body>
</html>
