<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dmh
 */

get_header(); ?>



<div class="top-articles posts section bg1">
	<div class="container">
		<h2 class="title">Top Articles</h2>
		<div class="post-list">
			<?php
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'order' => 'DESC',
					'orderby' => 'date',
					'category__not_in' => array( 15, 16 ),
					'posts_per_page' => 4,
					'offset' => 1
				);

				$query = new WP_Query($args);
				$posts = $query->posts;

				include(get_template_directory() . '/template-parts/post-loop.php');
			?>
		</div>
	</div>
</div>

<div class="all-articles posts section">
	<div class="container">
		<h2 class="title">All Articles</h2>
		<div class="post-list three-col" id="ajax-posts"></div>
		<button class="button blue" id="load-more">Load More</button>
	</div>
</div>


<?php get_footer();
