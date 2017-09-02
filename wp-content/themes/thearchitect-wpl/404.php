<?php
/**
 * The default template for 404 error page
 *
 * @package WordPress
 * @subpackage The Architect
 * @since The Architect 1.0
 */
?>
<?php get_header(); ?>
<section id="main" class="wrap cf" role="main">
	<div class="m-all t-all d-all">
		<div id="inner-content" class="blog_content cf">
			<article id="post-not-found" class="hentry cf">
				<header class="article-header">
					<h1><?php _e( 'Error 404 - Article Not Found', 'thearchitect-wpl' ); ?></h1>
				</header>
				<section class="entry-content">
					<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'thearchitect-wpl' ); ?></p>
				</section>
				<section class="search">
						<p><?php get_search_form(); ?></p>
				</section>
				
		</div>
	</div>
</section>
<?php get_footer(); ?>
