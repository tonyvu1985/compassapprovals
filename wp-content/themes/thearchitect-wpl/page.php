<?php 
/**
 * The default template for displaying Single pages
 *
 * @package WPlook
 * @subpackage The Architect
 * @since The Architect 1.0
 */
 ?>

 <?php get_header(); ?>
<section id="main" class="cf" role="main">
	<div class="m-all t-all d-all">
		<?php if (have_posts()) : while (have_posts()) : the_post();
			$page_layout = get_post_meta($post->ID, 'wpl_page_layout', true);
			$page_default_title = get_post_meta($post->ID, 'wpl_page_default_title', true);
			$page_featured_height = get_post_meta($post->ID, 'wpl_page_featured_height', true);
			$page_featured_content = get_post_meta($post->ID, 'wpl_page_featured_content', true);
			$header_image = get_header_image();
		?>
		
		
		<?php  get_template_part( 'inc', 'slider' ); ?>

		<?php if ($page_layout == 'boxed') { ?>
			<div class="wrap">
		<?php } ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<div class="entry-content cf" itemprop="articleBody">

					<?php if( $page_default_title !== 'disable' ) { ?>
						<div class="inner">
							<h1><?php the_title(); ?></h1>
						</div>
					<?php } ?>
					<?php the_content(); ?>
				</div>

			</article>

		<?php endwhile; else : ?>

			<article id="post-not-found" class="hentry cf">
				<header class="article-header">
					<h1><?php _e( 'Oops, Page Not Found!', 'thearchitect-wpl' ); ?></h1>
				</header>
			</article>

		<?php endif; ?>

		<?php if ($page_layout == 'boxed') { ?>
			</div>
		<?php } ?>
	</div>
</section>
<?php get_footer(); ?>
