<?php
/*
 * Template Name: Activities
 */

	get_header('pages');
?>
<div id="activities" class="wrapper">
	<div id="activities-overview" class="container">
		<h2 class="page-title">what we do</h2>

		<div class="activities-elements-wrapper row">
			<?php
				// Get the activities child pages
				$page_ID = get_ID_by_slug('activities');
				$args=array(
				  'post_type' => 'page',
				  'post_status' => 'publish',
				  'post_parent' => $page_ID,
				  'order' => 'ASC',
				  'orderby' => 'menu_order'
				  );
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<a class="activities-element col-md-6 col-sm-6 col-xs-12 item-style-1" href="<?php echo get_the_permalink(); ?>">
							<div class="item-image-content vertical-center-wrapper">
								<div class="vertical-center">
						  			<h1><?php the_title(); ?></h1>
						  			<p class="subtitle"><?php echo get_post_field( 'subtitle', get_the_ID(), true) ?></p>
								</div>
							</div>
							<div class="item-image-wrapper">
								<div class="item-image-blur" style="
									<?php if ( has_post_thumbnail(get_the_ID()) ) { ?>
										<?php $post_image_id = get_post_thumbnail_id(get_the_ID());
										if ($post_image_id) {
											$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
											if ($thumbnail) (string)$thumbnail = $thumbnail[0];
										}
										echo 'background:url(\''.$thumbnail.'\') no-repeat center center;background-size:cover;'; ?>
										<?php } ?>
									">
								</div>
								<div class="item-image" style="
									<?php if ( has_post_thumbnail(get_the_ID()) ) { ?>
										<?php $post_image_id = get_post_thumbnail_id(get_the_ID());
										if ($post_image_id) {
											$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
											if ($thumbnail) (string)$thumbnail = $thumbnail[0];
										}
										echo 'background:url(\''.$thumbnail.'\') no-repeat center center;background-size:cover;'; ?>
										<?php } ?>
									">
								</div>
							</div>
						</a>
						<?php 
					endwhile;
				}
			?>
		</div>
	</div>
</div>



<?php get_footer() ?>