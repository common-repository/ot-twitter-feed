<?php
/*
Plugin Name: Twitter Feed
Plugin URI: https://www.omegatheme.com/wordpress/extensions-2/357-ot-twitter-feed
Description: This is an awesome Wordpress plugin to display your latest tweets from twitters. The admin panel is kept to be as simple as impossible: add your twitter widget ID and enjoy.Message.
Author: Omegatheme
Version: 1.3.1
Company: XIPAT Flexible Solutions 
Author URI: http://www.omegatheme.com
*/

define('OTTWITTER_PLUGIN_NAME', 'Twitter Feed');
define('OTTWITTER_PLUGIN_VERSION', '1.3.1');
define('OTTWITTER_PLUGIN_URL',plugins_url(basename(plugin_dir_path(__FILE__ )), basename(__FILE__)));

add_action( 'init', 'ottwitter_required_css' );
function ottwitter_required_css() {
    wp_register_style( 'ottwitter_css', plugins_url('/assets/css/ottwitterfeed.css', __FILE__) );
    wp_enqueue_style( 'ottwitter_css' );
}

include_once("functions.php");
include_once("ottwitterfeed-shortcode.php");

/*-------------------------------- Links --------------------------------*/
function ottwitter_plugin_action_links($links, $file) {
    $plugin_file = basename(__FILE__);
    if (basename($file) == $plugin_file) {
        $settings_link = '<a href="' . admin_url('options-general.php?page=ottwitter') . '">' . ottwitter_e('Settings') . '</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
add_filter('plugin_action_links', 'ottwitter_plugin_action_links', 10, 2);

register_activation_hook( __FILE__, 'ottwitter_install' );
function ottwitter_install() {
	$message = "OT Twitter Feed plugin installed.\n\n url: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."\ntheme: ".wp_get_theme()."\nadmin: ".get_bloginfo('admin_email');@mail('contact@omegatheme.com', 'OT Twitter Feed plugin installed', $message);
}

function ottwitter_e($text, $params=null) {
    if (!is_array($params)) {
        $params = func_get_args();
        $params = array_slice($params, 1);
    }
    return vsprintf(__($text, 'ottwitter'), $params);
}

/*-------------------------------- Menu --------------------------------*/
function ottwitter_setting_menu() {
    add_submenu_page(
         'options-general.php',
         'OT Twitter Feed',
         'OT Twitter Feed',
         'moderate_comments',
         'ottwitter',
         'ottwitter_setting'
    );
}
add_action('admin_menu', 'ottwitter_setting_menu', 10);

function ottwitter_setting() {
    include_once(dirname(__FILE__) . '/ottwitterfeed-setting.php');
}

