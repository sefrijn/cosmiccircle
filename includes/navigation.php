<?php 
$home_url = function_exists('pll_home_url') ? pll_home_url() : get_site_url();
?>

<!-- Navigation -->
<div class="navigation">
	<div class="container">
	    <input type="checkbox" id="hamburger"/>
		<label class="menuicon" for="hamburger">
  			<span></span>
		</label>
		<!-- <h2 class="menuicon-caption"><?php // _e('Menu') ?></h2> -->
		<a href="<?php echo $home_url ?>" class="logo">
			<h2>cosmic circle</h2>
			<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/cc_logo_nav.png" alt=""> -->
		</a>
		<div class="menu-wrapper">
			<?php wp_nav_menu(); ?>
		</div>
	</div>
</div>