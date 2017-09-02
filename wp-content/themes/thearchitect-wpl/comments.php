<?php
// don't load it if you can't comment
if ( post_password_required() ) {
	return;
}
?>

<?php if( have_comments() || comments_open() ) : ?>

	<div id="comments" class="m-all t-all d-all cf">
		<div id="respond-container">

			<?php if ( have_comments() ) : ?>

				<h3 id="comments-title"><?php comments_number( __( '<span>No</span> discussion', 'thearchitect-wpl' ), __( '<span>1</span> comment', 'thearchitect-wpl' ), _n( '<span>%</span> comments', '<span>%</span> comments', get_comments_number(), 'thearchitect-wpl' ) );?></h3>

				<section class="commentlist">
					<?php wp_list_comments( array(
						'style'			 => 'div',
						'short_ping'		=> true,
						'avatar_size'		 => 52,
						'callback'			=> 'wpl_comments',
						'type'				=> 'all',
						'reply_text'		=> 'Reply',
						'page'				=> '',
						'per_page'			=> '',
						'reverse_top_level' => null,
						'reverse_children'	=> ''
					) ); ?>
				</section>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
					<nav class="navigation comment-navigation" role="navigation">
						<div class="comment-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'thearchitect-wpl' ) ); ?></div>
						<div class="comment-nav-next"><?php next_comments_link( __( 'More Comments &rarr;', 'thearchitect-wpl' ) ); ?></div>
					</nav>
				<?php endif; ?>

				<?php if ( ! comments_open() ) : ?>
					<p class="no-comments"><?php _e( 'Comments are closed.' , 'thearchitect-wpl' ); ?></p>
				<?php endif; ?>

			<?php endif; ?>

			<?php comment_form(); ?>

		</div>
	</div>

<?php endif; ?>
