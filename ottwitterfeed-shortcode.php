<?php
/**
 * Function ottwitter_feed_shortcode()  is used to create shortcode for plugin.
*/
function ottwitter_feed_shortcode($atts){
	$settings = (array) get_option( 'ottwitter-plugin-settings' );
	extract(shortcode_atts(array(
		'width' => '',
		'height' => '',
		), $atts));
	if($atts && $atts['width']) {
		$ot_width = $atts['width'];
	} else {
		$ot_width = $settings['ottwitter_width'];
	}
	if($atts && $atts['height']) {
		$ot_height = $atts['height'];
	} else {
		$ot_height = $settings['ottwitter_height'];
	}
	ob_start();
	if($settings['ottwitter_animate'] == 'slider') { ?>
		<div id="ot_twitter_update">
			<div id="ot_twitter_box" style="top: 50px; right: -<?php echo $ot_width ?>px; z-index: 10000;">
				<img id="ot_img" style="top:150px;left:-38px; cursor: pointer;" src="<?php echo plugins_url('/assets/images/twitter.png', __FILE__) ?>">
				<div id="" class="a {title:'twitter'}" data-twttr-id="twttr-sandbox-1">
					<a class="twitter-timeline" href="https://twitter.com/<?php echo $settings['ottwitter_widget_id'] ?>"
					data-theme="<?php echo $settings['ottwitter_theme'] ?>"
					data-link-color="<?php echo $settings['ottwitter_link_color'] ?>"  data-related="twitterapi,twitter"
					data-aria-polite="assertive" width="<?php echo $ot_width ?>" height="<?php echo $ot_height ?>" lang="EN">Tweets by @<?php echo $settings['ottwitter_widget_id'] ?></a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
		</div>
		<?php if($settings['ottwitter_position'] == 'right') { ?>
			<script type="text/javascript">
				jQuery(function($){
					$("#ot_img").click(function(){
						$("#ot_twitter_box").toggleClass("right0");
					});
				});
			 </script>
		<?php } else { ?>
			<script type="text/javascript">
				jQuery(function($){
					$("#ot_img").click(function(){
						$("#ot_twitter_box").toggleClass("left0");
					});
				});
			 </script>
		<?php }
	} else { ?>
		<a class="twitter-timeline" href="https://twitter.com/<?php echo $settings['ottwitter_widget_id'] ?>"
			data-theme="<?php echo $settings['ottwitter_theme'] ?>"
			data-link-color="<?php echo $settings['ottwitter_link_color'] ?>"  data-related="twitterapi,twitter"
			data-aria-polite="assertive" width="<?php echo $ot_width ?>" height="<?php echo $ot_height ?>" lang="EN">Tweets by @<?php echo $settings['ottwitter_widget_id'] ?></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<?php }
  
	$shortcodeData = ob_get_contents(); 
	ob_end_clean();
	return $shortcodeData;
} 

/**
 * Function ottwitter_register_shortcodes()  is used to register shortcode.
*/
function ottwitter_register_shortcodes(){
	add_shortcode('ottwitter_feed', 'ottwitter_feed_shortcode');
}
add_action( 'init', 'ottwitter_register_shortcodes');
?>