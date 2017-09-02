<?php
/**
 * Template Name: Page with Sidebar
 *
 * @package WordPress
 * @subpackage The Architect
 * @since The Architect 1.0.0
 **/
?>

<?php get_header(); ?>

	<section id="main" class="cf" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); 
			$page_layout = get_post_meta($post->ID, 'wpl_page_layout', true);
			$page_featured_height = get_post_meta($post->ID, 'wpl_page_featured_height', true);
			$page_featured_content = get_post_meta($post->ID, 'wpl_page_featured_content', true);
		?>

		<?php if ( has_post_thumbnail() ) { ?>
		<div class="entry-header cf" style="height: <?php echo $page_featured_height; ?>">

			<?php if($page_featured_content) { ?>
			<div class="inner">
				<div class="wrap">
					<?php echo $page_featured_content; ?>
				</div>
			</div> 
			<?php } ?>

			<?php the_post_thumbnail('full'); ?>

		</div>
		<?php } ?>

		<?php if ($page_layout == 'boxed') { ?>
		<div class="wrap">
		<?php } ?>

		<div class="m-all t-2of3 d-5of7">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<div class="entry-content cf" itemprop="articleBody">
					<div class="inner">
						<?php the_content(); ?>
					</div>
				</div>

			</article>

			<?php endwhile; else : ?>

			<article id="post-not-found" class="hentry cf">

				<header class="article-header">
					<h1><?php _e( 'Oops, Post Not Found!', 'thearchitect-wpl' ); ?></h1>
				</header>

				<section class="entry-content">
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'thearchitect-wpl' ); ?></p>
				</section>

				<footer class="article-footer">
					<p><?php _e( 'This is the error message in the page.php template.', 'thearchitect-wpl' ); ?></p>
				</footer>

			</article>

		<?php endif; ?>

		</div>

		<div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 cf" role="complementary">

			<?php get_sidebar(); ?>

		</div>

		<?php if ($page_layout == 'boxed') { ?>
		</div>
		<?php } ?>

	</section>

<?php get_footer(); ?>
