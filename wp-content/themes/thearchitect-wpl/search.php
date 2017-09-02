<?php
/**
 * The default template for search results
 *
 * @package WordPress
 * @subpackage The Architect
 * @since The Architect 1.0
 */
?>

<?php get_header(); ?>

	<section id="main" class="cf" role="main">
	
		<div class="wrap">

			<div class="m-all t-2of3 d-5of7">	

				<?php if ( have_posts() ) : ?>

				<div class="entry-content cf" itemprop="articleBody">

					<div class="inner">

						<h1><span><?php _e( 'Search results for:', 'thearchitect-wpl' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
						<p><?php _e( 'Found', 'thearchitect-wpl' ); ?> <?php $total_results = $wp_query->found_posts; echo $total_results; ?> <?php _e( 'result(s)', 'thearchitect-wpl' ); ?>.</p>
						<span class="line medium black"></span>
						
						<div class="blog_content">

							<?php
								// Start the Loop.
								while ( have_posts() ) : the_post(); ?>

									<article id="post-<?php the_ID(); ?>">

										<div class="entry-header-search">
											<div class="entry-title"><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
										</div>
										
									</article>

								<?php endwhile;
								// Previous/next post navigation.
								bones_page_navi();

								else :
									// If no content, include the "No posts found" template.
									get_template_part( 'content', 'none' );

								endif;
							?>
							
						</div>

					</div>

				</div>				

			</div>

		</div>

	</section>

<?php get_footer(); ?>
