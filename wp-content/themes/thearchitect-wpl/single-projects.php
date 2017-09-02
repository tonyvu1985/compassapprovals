<?php
/**
 * The default template for displaying single projects
 *
 * @package WPlook
 * @subpackage The Architect
 * @since The Architect 1.0
 */
?>

<?php global $sbwp_options; get_header(); ?>

		<div id="content">

			<?php if (have_posts()) : while (have_posts()) : the_post();
				$sidebar = get_post_meta($post->ID, 'wpl_project_sidebar', true);
				$project_location = get_post_meta(get_the_ID(), 'wpl_project_location', true);
				$project_terms = get_the_terms($post->ID, 'projects_cat');
				$project_text_color = get_post_meta($post->ID, 'wpl_project_text_color', true);
				$post_featured_image = get_post_thumbnail_id($post->ID);
				if ($post_featured_image) {
					$project_thumbnail = wp_get_attachment_image_src( $post_featured_image, 'full', false);
					if ($project_thumbnail) (string)$project_thumbnail = $project_thumbnail[0];
				}
			?>

			<div class="project-cover cf">

           		<?php the_post_thumbnail('full'); ?>
           		<div class="hero-title">
           			<h1 class="custom-post-type-title <?php echo $project_text_color; ?>"><?php the_title(); ?></h1>
           			<span class='line medium <?php echo $project_text_color ?>'></span>
            		<?php
            		$html = "";
            		$html .= '<p class="' . $project_text_color . '">';
                    if($project_terms) { $numTerms = count($project_terms); $i = 1;

                        foreach($project_terms as $term) {
                            $html .= "$term->name";
                        if($i < $numTerms)
                            $html .= ", ";
                        $i++; }
                    }
                    if( $project_terms && $project_location ) {
                    	$html .= ", ";
                    }
                    if($project_location) {
                        $html .= "$project_location";

                    }
                    $html .= "</p>";

                    echo $html;
                    ?>
           		</div>

			</div>

			<div id="down_button">
				<a href="#inner-content"><i class="fa fa-4x fa-angle-down pulsing"></i></a>
			</div>

		</div>

		<div id="inner-content">

			<?php if($sidebar != 'fullwidth') { ?>

			<div class="wrap cf">

				<section class="m-all t-2of3 d-5of7">

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

						<section class="entry-content">

							<?php the_content(); ?>

						</section>

					</article>

				</section>

			<?php } else { ?>

				<section class="m-all t-all d-all">

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

						<section class="entry-content wrap cf">

							<?php the_content(); ?>

						</section>

					</article>

				</section>

			<?php } ?>

			<?php if($sidebar != 'fullwidth') { ?>

				<section class="m-all t-1of3 d-2of7 sidebar last-col" role="complementary">

					<div class="inner">
						<?php if ( is_active_sidebar( 'sidebar-projects-single' ) ) {
							dynamic_sidebar( 'sidebar-projects-single' );
						} ?>
					</div>

				</section>

			</div>

			<?php } ?>

			<?php endwhile; ?>

			<section class="projects-pagination cf">
				<div class="wrap cf">
					<ul>
						<li class="prev-nav"><?php previous_post_link('%link', '<i class="fa fa-3x fa-fw fa-angle-left"></i> <span>%title</span>'); ?></li>
						<li class="back-nav"><a href="<?php echo get_permalink( ot_get_option('wpl_projects_page') ); ?>"><i class="fa fa-3x fa-fw fa-th"></i></a></li>
						<li class="next-nav"><?php next_post_link('%link', '<span>%title</span> <i class="fa fa-3x fa-fw fa-angle-right"></i>'); ?></li>
					</ul>
				</div>
			</section>

			<?php else : ?>

				<article id="post-not-found" class="hentry cf">
					<header class="article-header">
						<h1><?php _e( 'Oops, Post Not Found!', 'thearchitect-wpl' ); ?></h1>
					</header>
					<section class="entry-content">
						<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'thearchitect-wpl' ); ?></p>
					</section>
					<footer class="article-footer">
						<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'thearchitect-wpl' ); ?></p>
					</footer>
				</article>

			<?php endif; ?>

		</div>

<?php get_footer(); ?>
