<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dmh
 */

get_header(); ?>


<div class="post-single container">
	<h1><?php the_title(); ?></h1>
	<div class="post-intro">

		<div class="intro-image">
			<?php
				if( get_field('has_video') && get_field('video_embed')){
					echo '<div class="yt-container">';
						the_field('video_embed');
					echo '</div>';
				} else {
					echo '<img src="' . get_the_post_thumbnail_url($post->ID) . '" alt="" />';
				}
			?>
		</div>

		<div class="post-info">
			<span class="category"><?= get_all_categories($post); ?></span>
			<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
			<?php if(!get_field('has_video')) echo '<span class="caption">' . wp_get_attachment_caption( get_post_thumbnail_id($post->ID) ) . '</span>'; ?>
		</div>
	</div>

	<div class="post-content">
		<?= the_content(); ?>
	</div>
</div>


<?php

	/* RELATED POSTS *****************/

	$cat = get_the_category($post->ID);
	$cat = $cat[0];
	$cat = $cat->term_id;

	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'order' => 'DESC',
		'orderby' => 'date',
		'post__not_in' => array($post->ID),
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $cat
			),
		),					
		'category__not_in' => array( 15, 16 ),
		'posts_per_page' => 3,
	);

	$query = new WP_Query($args);
	$posts = $query->posts;
	$query->post_count;

	if($query->post_count > 0){ ?>

	<div class="related-articles posts section bg1 nomargin">
		<div class="container">
			<h2 class="title">Related</h2>
			<div class="post-list three-col">
					<?php include(get_template_directory() . '/template-parts/post-loop.php'); ?>
			</div>
		</div>
	</div>

<?php } // end if ?>


<?php get_footer();
