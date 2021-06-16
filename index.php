<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );
/*connected to Database*/

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
?>



<?php
include 'functions_custom.php';

// Home Page template below.
?>

<?php echo template_header('Home'); ?>

<div class="content">
	<h2>Accueil</h2>
	<p>ma home page !</p>
</div>

<?php echo template_footer(); ?>


