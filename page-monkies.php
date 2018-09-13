<?php
/*
 * Template Name: Monkies
 */

	get_header('pages');
?>
<div id="monkies" class="wrapper">
	<div class="container">
	<h2 class="page-title">sefrijn & eline</h2>
		<div class="row">
			<?php 
				$counter = 0;
				$page_ID = get_ID_by_slug('people');
				$args=array(
				  'post_type' => 'page',
				  'post_status' => 'publish',
				  'post_parent' => $page_ID,
				  'order' => 'DESC',
				  'orderby' => 'menu_order',
				  'posts_per_page' => '2'
				  );
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					?> <div class="col-md-2"></div><?php
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
		  				<?php $counter++; ?>
						<?php $website = get_post_meta(get_the_ID(), 'website', true ); ?>
						<div class="col-md-4 col-sm-3 col-xs-6 monkie-item">
							<a class="monkie-image" href="<?php echo get_the_permalink(); ?>">
					  			<?php if ( has_post_thumbnail() ) { ?>
					  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
								<?php } ?>
								<div class="title">
					  				<h3><?php the_title(); ?></h3>
					  				<p class="location">&nbsp;<?php echo get_post_meta(get_the_ID(), 'location', true );?></p>
					  			</div>
							</a>
				  			<p class="intro"><?php echo excerpt(55); ?></p>
							<?php if ( ! empty( $website ) ) { ?>
								<a class="intro" href="http://<?php echo $website; ?>"><?php echo $website; ?></a>
							<?php } ?>			  			
						</div>

						<?php if($counter % 4 == 0){
							echo '</div><div class="row">';
						}
					endwhile;
				}else{
					echo "Oh my gawd!! No Monkies were found in the database!";
				}
			?>
		</div>
	</div>
	<div class="container">
		<hr>
	<h2 class="page-title">collaborators</h2>
	<p class="text-center">We work with a lot of gifted facilitators and musicians.</p>
		<div class="row">
			<?php 
				$counter = 0;
				$page_ID = get_ID_by_slug('people/collaborators');
				$args=array(
				  'post_type' => 'page',
				  'post_status' => 'publish',
				  'post_parent' => $page_ID,
				  'order' => 'DESC',
				  'orderby' => 'menu_order',
				  'posts_per_page' => '50'
				  );
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
		  				<?php $counter++; ?>
						<?php $website = get_post_meta(get_the_ID(), 'website', true ); ?>
						<div class="col-md-3 col-sm-3 col-xs-6 monkie-item">
							<a class="monkie-image" href="<?php echo get_the_permalink(); ?>">
					  			<?php if ( has_post_thumbnail() ) { ?>
					  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
								<?php } ?>
								<div class="title">
					  				<h3><?php the_title(); ?></h3>
					  				<p class="location">&nbsp;<?php echo get_post_meta(get_the_ID(), 'location', true );?></p>
					  			</div>
							</a>
				  			<p class="intro"><?php echo excerpt(15); ?></p>
							<?php if ( ! empty( $website ) ) { ?>
								<a class="intro" href="http://<?php echo $website; ?>"><?php echo $website; ?></a>
							<?php } ?>			  			
						</div>

						<?php if($counter % 4 == 0){
							echo '</div><div class="row">';
						}
					endwhile;
				}else{
					echo "Oh my gawd!! No Monkies were found in the database!";
				}
			?>
		</div>
	</div>

</div>
<?php get_footer() ?>