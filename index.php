<?php get_header(); ?>

<?php if(function_exists("pll_get_post")){
	if(pll_current_language() == 'en'){ ?>

	<div class="alert alert-warning alert-dismissible container" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Under Construction!</strong><br>Our English part of the site is still very much under construction. Some events are missing, some text is incomplete.
	</div>
	<?php } ?>
<?php } ?>

<div id="home" class="wrapper">


<!-- VISION -->
	<div id="vision" class="container">
		<h1><?php _e('our vision', 'themonkies') ?></h1>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php 
					$page_ID = get_ID_by_slug('vision');
					$content_post = get_post($page_ID);
					$content = $content_post->post_content;
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]&gt;', $content);
					echo $content;
				 ?>
			</div>
		</div>
		<div class="vision-elements-wrapper row">
			<?php
				// Get the Vision child pages
				$args=array(
				  'post_type' => 'page',
				  'post_status' => 'publish',
				  'post_parent' => $page_ID,
				  'order' => 'ASC',
				  'orderby' => 'menu_order'
				  );
				$post_parent = get_post($page_ID); 
				$slug = $post_parent->post_name;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<a class="vision-element col-lg-4 col-md-4 col-sm-4 item-style-1" href="<?php echo get_home_url().'/'.$slug.'#'.$post->post_name; ?>">
							<div class="item-image-content vertical-center-wrapper">
								<div class="vertical-center">
						  			<h2><?php the_title(); ?></h2>	
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
		<div class="vision-read-more">
			<a href="<?php echo get_the_permalink($page_ID); ?>"><?php _e('read our vision', 'themonkies') ?></a>
		</div>	
	</div>

<!-- ACTIVITIES -->
	<div id="activities" class="container">
		<h1><?php _e('what we do', 'themonkies') ?></h1>
		<div class="activities-elements-wrapper row">
			<?php
				// Get the activities child pages
				$page_ID = get_ID_by_slug('activities');
				$args=array(
				  'post_type' => 'page',
				  'post_status' => 'publish',
				  'post_parent' => $page_ID,
				  'order' => 'ASC',
				  'orderby' => 'menu_order',
				  'posts_per_page' => '4'
				  );
				$post_parent = get_post($page_ID); 
				$slug = $post_parent->post_name;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<a class="activities-element col-lg-3 col-md-3 col-sm-4 col-xs-12 item-style-1" href="<?php echo get_the_permalink(); ?>">
							<div class="item-image-content vertical-center-wrapper">
								<div class="vertical-center">
						  			<h2><?php the_title(); ?></h2>	
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
		<div class="activities-read-more">
			<a href="<?php echo get_the_permalink($page_ID); ?>"><?php _e('all our activities', 'themonkies') ?></a>
		</div>	
	</div>



	<div class="container" id="events-blog">
		<div class="row">

<!-- EVENTS -->

			<div id="events" class="col-md-6 col-md-offset-3">
				<h1 class="text-center"><?php _e('upcoming events', 'themonkies') ?></h1>
				<?php dynamic_sidebar( 'events_widget' ); ?>
			</div>

		</div>
	</div>

<!-- PEOPLE -->

	<div id="monkies" class="container">
		<div class="row">
			<h1><?php _e("who are we?"); ?></h1>
			<p class="text-center">Cosmic Circle is run by Sefrijn Langen & Eline Louise.<br>But we could not do it without our beloved collaborators</p>
			<?php
				// Get the monkie child pages
				$page_ID = get_ID_by_slug('people');			
				$args=array(
				  'post_type' => 'page',
				  'post_status' => 'publish',
				  'post_parent' => $page_ID,
				  'posts_per_page' => 3,
				  'orderby' => 'menu_order',				  
				  'order' => 'DESC'
				  );
				$my_query = new WP_Query($args);
				$i = 0;
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<?php $i++; ?>
						<?php if($i == 3){ ?>
							<a href="<?php echo get_the_permalink(get_ID_by_slug('people')); ?>" class="col-md-4 col-sm-4 col-xs-6 monkie">
						<?php }else{ ?>
							<a href="<?php echo get_the_permalink(); ?>" class="col-md-4 col-sm-4 col-xs-6 monkie">
						<?php } ?>

							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail('news-thumb');
							} ?>			
							<div class="content">
								<h2><?php the_title(); ?></h2>
							</div>
						</a>
						<?php
					endwhile;
				}else{
					echo "Oh my gawd!! No Monkies were found in the database!";
				}
			?>
		</div>
	</div>


<!-- LOCATION -->

	<div id="location" class="container">
		<h1><?php echo __("Contact us") ?></h1>
		<p><?php _e('Are you interested in hosting our workshop? Do you have a question about upcoming events?.', 'themonkies') ?></p>
		<a href="<?php echo get_the_permalink(get_ID_by_slug('contact')); ?>"><?php _e('Send a Message', 'themonkies') ?></a>
	</div>
</div>
<?php get_footer() ?>