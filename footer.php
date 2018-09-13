<!-- Mailchimp -->
<hr>
<div class="container mailchimp">
	<h4>Newsletter</h4>
	<div class="row">
		<div class="col-md-4">
			<p>Do you wish to stay updated about our events? We will send you a monthly newsletter with an overview. You can unsubscribe at any time.</p>

		</div>
		<div class="col-md-8">

			<!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup">
				<form action="https://cosmiccircle.us15.list-manage.com/subscribe/post?u=5690eb0909662faa7a2db561d&amp;id=07b68a2df5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div class="mc-field-group">
							<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
							</label>
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
						</div>
						<div class="mc-field-group">
							<label for="mce-FNAME">First Name </label>
							<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
						</div>
						<div class="mc-field-group">
							<label for="mce-LNAME">Last Name </label>
							<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
						</div>
					</div>

						


					<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>

						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5690eb0909662faa7a2db561d_07b68a2df5" tabindex="-1" value=""></div>
	
				</form>
			</div>

			<!--End mc_embed_signup-->


		</div>	

	</div>
</div>




<!-- INSTAGRAM -->
	<div id="instagram" class="container">
		<div class="row">
			<?php echo do_shortcode('[instagram-feed]'); ?>
		</div>
	</div>


<!-- EVENTS SMALL -->
<?php // Retrieve the next 3 upcoming events
$events = tribe_get_events( array(
    'posts_per_page' => 3,
    'start_date' => time(),
) );
if(count($events) != 0){ ?>
	<div id="event-mini" class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<a href="<?php echo get_home_url()."/events"; ?>"><h3>upcoming events</h3></a>
				<?php if(function_exists("pll_get_post")){ ?>
						<a href="<?php echo pll_home_url($slug)."events"; ?>"><h3><?php _e('agenda', 'themonkies') ?></h3></a>
				<?php }?>
			</div>
			<?php foreach ( $events as $post ) { ?>
			<div class="col-md-3 col-sm-3">
				<?php
		    		setup_postdata( $post );
					echo '<a href="'.get_the_permalink().'"><span>'.tribe_get_start_date( $post ).'</span><br>';
			    	echo $post->post_title.'</a>';
			    ?>
			</div>
			<?php }	?>
		</div>
	</div>
<?php } ?>


<footer>
&copy; Cosmic Circle <?php echo date("Y"); ?> | <span class="dashicons dashicons-email-alt"></span> <a href="mailto:love@cosmiccircle.org">love@cosmiccircle.org</a> | <span class="dashicons dashicons-facebook-alt"></span> <a href="http://www.facebook.com/thecosmiccircle">Facebook</a> | <a href="http://soundcloud.com/cosmiccircle">Soundcloud</a> | Site by <a href="http://www.howaboutyes.com/">How About Yes</a>
</footer>

<!-- GOOGLE ANALYTICS -->



<?php wp_footer(); ?>
</body>
</html>
