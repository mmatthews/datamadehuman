<?php

/**
 * Single Category Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dmh
 */

get_header();

$term_ob = get_queried_object();
?>


<div class="all-articles posts section bg1">
	<div class="container">
		<h2 class="title"><?php echo $term_ob->cat_name; ?></h2>

		<div class="post-list three-col">
			<?php
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'order' => 'DESC',
					'orderby' => 'date',
                    //'category__not_in' => array( 2, 6 ),
                    'category__in' => $term_ob->term_id,
                    'posts_per_page' => 9999,
                    //'offset' => 1
				);

				$query = new WP_Query($args);
				$posts = $query->posts;

				include(get_template_directory() . '/template-parts/post-loop.php');
			?>
		</div>
	</div>
</div>


<?php get_footer();
