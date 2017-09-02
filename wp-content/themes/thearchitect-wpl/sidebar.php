<?php
/**
 * The default Sidebar. It will appear on all Press/Blog pages
 *
 * @package WordPress
 * @subpackage The Architect
 * @since The Architect 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar1' ); ?>
<?php else : ?>
<?php endif; ?>


