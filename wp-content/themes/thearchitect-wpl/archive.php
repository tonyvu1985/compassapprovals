<?php 
/**
 * The default template for displaying Post Archive
 *
 * @package WPlook
 * @subpackage The Architect
 * @since The Architect 1.0
 */
 ?>
 <?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

		<div id="main" class="m-all t-all d-all cf" role="main">
			
				<h1 class="archive-title">
					<?php wplook_doctitle(); ?>
				</h1>

			<span class="line small black"></span>

			<div class="blog_content">

				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?> 
					
					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?> 

				<?php else: ?>

					<?php get_template_part( 'content', get_post_format() ); ?>
					
				<?php endif; ?>
			</div>				

		</div>


</div>

<?php get_footer(); ?>
