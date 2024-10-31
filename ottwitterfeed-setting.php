<?php

if (!current_user_can('manage_options')) {
    die('The account you\'re logged in to doesn\'t have permission to access this page.');
}

wp_enqueue_script('jquery');

wp_register_script('ottwitter_admin_js', plugins_url('/assets/js/bootstrap.min.js', __FILE__));
wp_enqueue_script('ottwitter_admin_js', plugins_url('/assets/js/bootstrap.min.js', __FILE__));
wp_register_style('ottwitter_admin_css', plugins_url('/assets/css/bootstrap.min.css', __FILE__));
wp_enqueue_style('ottwitter_admin_css', plugins_url('/assets/css/bootstrap.min.css', __FILE__));

wp_register_style('ottwitter_setting_css', plugins_url('/assets/css/ottwitterfeed-setting.css', __FILE__));
wp_enqueue_style('ottwitter_setting_css', plugins_url('/assets/css/ottwitterfeed-setting.css', __FILE__));

?>
<span class="version"><?php echo ottwitter_e('Version: %s', esc_html(OTTWITTER_PLUGIN_VERSION)); ?></span>
<div class="ottwitter-setting container-fluid">
	<div class="ottwitter-facebook"><?php echo ottwitter_e('OT Twitter Feed'); ?></div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#setting" aria-controls="setting" role="tab" data-toggle="tab"><?php echo ottwitter_e('Setting'); ?></a>
        </li>
        <li role="presentation">
            <a href="#shortcode" aria-controls="shortcode" role="tab" data-toggle="tab"><?php echo ottwitter_e('Shortcode'); ?></a>
        </li>
    </ul>
    <div class="tab-content">
    	<div role="tabpanel" class="tab-pane active" id="setting">
         	<form action="options.php" method="POST">
		        <?php settings_fields('ottwitter-settings-group'); ?>
		        <?php do_settings_sections('ottwitter-plugin'); ?>
		        <?php submit_button(); ?>
	      	</form>
        </div>
        <div role="tabpanel" class="tab-pane" id="shortcode">
    		<h5><?php echo ottwitter_e('How to add shortcode'); ?></h5>
			<p><?php echo ottwitter_e('You can add this shortcode'); ?> <strong>[ottwitter_feed]</strong> <?php echo ottwitter_e('to file wp-content/themes/{your theme}/footer.php if you want to add slider layout or another position in your post or page content if you want to use fixed layout'); ?>.</p>
			<p>2. <?php echo ottwitter_e('It has following parameters'); ?>: </p>  
			<p>
				<ul class="parameters">
					<li class="list_parameter"><strong>width</strong> - <?php echo ottwitter_e('Twitter Feed Width(px)'); ?>.</li>
					<li class="list_parameter"><strong>height</strong> - <?php echo ottwitter_e('Twitter Feed Height(px)'); ?></li>
				</ul>
			</p>
			<p>3. <?php echo ottwitter_e('When you add the shortcode without any parameters, it will use width and height in plugin setting'); ?>.</p>
		</div>
	</div>
</div>