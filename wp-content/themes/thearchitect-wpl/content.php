<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage The Architect
 * @since The Architect 1.0
 */

?>


<?php if ( is_single() ) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-header">
			<?php the_category(', '); ?> <span class="sep">/</span>

			<time datetime="<?php echo get_the_date( 'c' ) ?>"><?php wplook_get_date(); ?></time>
			<h3 class="entry-title"><?php the_title(); ?></h3>
		</div>

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post_image">
				<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail('blog'); ?>
				</a>
			</div>
		<?php } ?>

		<div class="post_text entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
			<?php if( has_tag()) { ?>
				<span><i class="fa fa-tags fa-fw"></i>&nbsp;<?php the_tags('', ', ', ''); ?> </span>
			<?php } ?>
		</div>

		<?php if( ot_get_option('wpl_blog_author_info')  != "off") { ?>
			<div class="author_description">
				<div class="author_description_inner">
					<div class="image">
						<?php echo get_avatar(get_the_author_meta( 'ID' ), 72); ?>
					</div>
					<div class="author_text_holder">
						<h4>
						<?php
							if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
								echo get_the_author_meta('first_name') . " " . get_the_author_meta('last_name');
							} else {
								echo get_the_author_meta('display_name');
							}
						?>
						</h4>
						<?php if(get_the_author_meta('description') != "") { ?>
							<div class="author_text">
								<p><?php echo get_the_author_meta('description') ?></p>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</article>

<?php } else { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-header">
			<?php if( is_sticky() ) { ?> 
			<span class="sticky"><?php _e( 'Sticky Post', 'thearchitect-wpl' ); ?></span> &nbsp; <?php } ?>
			<?php the_category(', '); ?> 
			<span class="sep">/</span> 
			<time datetime="<?php echo get_the_date( 'c' ) ?>"><?php wplook_get_date(); ?></time>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		</div>

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post_image">
				<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail('blog'); ?>
				</a>
			</div>
		<?php } ?>
		<div class="post_text entry-content">
			<?php the_content(); ?>
		</div>
	</article>
<?php } ?>
