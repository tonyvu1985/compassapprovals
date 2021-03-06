<?php
/**
 * Template Name: Template Projects
 *
 * @package WordPress
 * @subpackage The Architect
 * @since The Architect 1.0.0
 */
?>
<?php get_header(); ?>
<?php
	$pid = $post->ID;
	$layout = ot_get_option('wpl_projects_cat_layout');
?>	
<section id="main" class="cf" role="main">

	<div class="m-all t-all d-all">
		
			

			<div class="module-title wrap cf">
				<div class="one_half">
					<h3><?php single_cat_title(); ?></h3>
					<p><?php echo category_description(); ?></p>
				</div>

				<div class="one_half last">
					<div class="filter right">
						<a class="btn medium black" href="<?php echo get_permalink(ot_get_option('wpl_projects_page')); ?>"><?php _e( 'Browse all', 'thearchitect-wpl' ); ?></a>
						<ul>
							<li><a href=""><?php _e('By sectors', 'thearchitect-wpl'); ?> <span>&rsaquo;</span></a>
								<ul class="sectors">
								<?php
									$terms = get_terms('projects_cat');
									foreach ($terms as $term) {
									echo "<li><a href=" . esc_attr(get_term_link($term, 'projects_cat')) . " title=" . sprintf( __( "View all projects in %s", 'thearchitect-wpl' ), $term->name ) . ">" . $term->name . "</a></li>";
									}
								?>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="block-grid projects-listing <?php echo $layout; ?> cf">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();
					$terms = wp_get_post_terms(get_the_ID(), 'projects_cat');
					$project_text_color = get_post_meta(get_the_ID(), 'wpl_project_text_color', true);
					$project_location = get_post_meta(get_the_ID(), 'wpl_project_location', true);
					
					$post_featured_image = get_post_thumbnail_id(get_the_ID());
					if ($post_featured_image) {
						$project_thumbnail = wp_get_attachment_image_src( $post_featured_image, 'full', false);
						if ($project_thumbnail) (string)$project_thumbnail = $project_thumbnail[0];
					}
					?>
						<article class="block-item cf">
							<a href="<?php the_permalink(); ?>" rel='bookmark' title="<?php the_title(); ?>">
								<div class="image" style="background-image: url(<?php echo $project_thumbnail; ?>);"></div>
								<div class="text <?php echo $project_text_color; ?>">
									<h1><?php the_title(); ?></h1>
									<span class="line medium <?php echo $project_text_color; ?>"></span>
									<p>
									<?php
										if($terms) { $numTerms = count($terms); $i = 1;
											foreach($terms as $term) {
												echo "$term->name";
											if($i < $numTerms)
												echo ", ";
											$i++; }
										}
										if( $terms && $project_location ) {
											echo ", ";
										}
										if($project_location) {
											echo $project_location;
										}
									?>
									</p>
								</div>
							</a>
						</article>

				<?php endwhile; ?>

		</div>

		<?php else : ?>

			<article id="post-not-found" class="hentry cf">
				<header class="article-header">
					<h1><?php _e( 'Oops, Post Not Found!', 'thearchitect-wpl' ); ?></h1>
				</header>
			</article>

	<?php endif; ?>

	<?php bones_page_navi() ?>

	</div>

</div>


<?php get_footer(); ?>
