<?php
add_action( 'admin_init', 'ottwitter_admin_init' );
function ottwitter_admin_init() {
  
  	register_setting( 'ottwitter-settings-group', 'ottwitter-plugin-settings' );
  	add_settings_section( 'section-1', __( 'OT Twitter Update', 'ottwitter' ), 'ottwitter_section_1_callback', 'ottwitter-plugin' );
	
  	add_settings_field( 'ottwitter_animate', __( 'Layout', 'ottwitter' ), 'ottwitter_animate_callback', 'ottwitter-plugin', 'section-1' );
  	add_settings_field( 'ottwitter_position', __( 'Slider positon', 'ottwitter' ), 'ottwitter_position_callback', 'ottwitter-plugin', 'section-1' );
    add_settings_field( 'ottwitter_widget_id', __( 'Twiter name', 'ottwitter' ), 'ottwitter_widgetid_callback', 'ottwitter-plugin', 'section-1' );
    add_settings_field( 'ottwitter_theme', __( 'Twitter Feed Theme', 'ottwitter' ), 'ottwitter_theme_callback', 'ottwitter-plugin', 'section-1' );
    add_settings_field( 'ottwitter_link_color', __( 'Twitter Color Link', 'ottwitter' ), 'ottwitter_linkcolor_callback', 'ottwitter-plugin', 'section-1' );
    add_settings_field( 'ottwitter_width', __( 'Twitter Feed Width(px)', 'ottwitter' ), 'ottwitter_width_callback', 'ottwitter-plugin', 'section-1' );
    add_settings_field( 'ottwitter_height', __( 'Twitter Feed Height(px)', 'ottwitter' ), 'ottwitter_height_callback', 'ottwitter-plugin', 'section-1' );
}

function ottwitter_section_1_callback() {
    echo ottwitter_e('Embed Multiple Twitter Timelines using only their usernames, or display tweets based on a keyword. Includes Fantastic SUPPORT FREE!');
}


/*
* THE FIELDS
* */
function ottwitter_animate_callback() {  
  $settings = (array) get_option( 'ottwitter-plugin-settings' );
  $field = "ottwitter_animate";
  $value = esc_attr( $settings[$field] ); ?>
   
  <select name='ottwitter-plugin-settings[<?php echo $field ?>]' id='ottwitter-plugin-settings[<?php echo $field ?>]'>
    <option value="fixed" <?php selected( $value, 'fixed' ); ?>><?php echo otfbmsg_e('Fixed layout'); ?></option>
    <option value="slider" <?php selected( $value, 'slider' ); ?>><?php echo otfbmsg_e('Slider layout'); ?></option>
  </select>
  <?php
}
function ottwitter_position_callback() {  
  $settings = (array) get_option( 'ottwitter-plugin-settings' );
  $field = "ottwitter_position";
  $value = esc_attr( $settings[$field] ); ?>
   
  <select name='ottwitter-plugin-settings[<?php echo $field ?>]' id='ottwitter-plugin-settings[<?php echo $field ?>]'>
    <option value="right" <?php selected( $value, 'right' ); ?>><?php echo otfbmsg_e('Right'); ?></option>
    <option value="left" <?php selected( $value, 'left' ); ?>><?php echo otfbmsg_e('Left'); ?></option>
  </select>
  <?php
}
function ottwitter_widgetid_callback() {
  
  $settings = (array) get_option( 'ottwitter-plugin-settings' );
  $field = "ottwitter_widget_id";

  $value = esc_attr( $settings[$field] );
  
  echo "<input type='text' size='60' name='ottwitter-plugin-settings[$field]' value='$value' />";
}
function ottwitter_theme_callback() {  
  $settings = (array) get_option( 'ottwitter-plugin-settings' );
  $field = "ottwitter_theme";
  $value = esc_attr( $settings[$field] ); ?>
   
  <select name='ottwitter-plugin-settings[<?php echo $field ?>]' id='ottwitter-plugin-settings[<?php echo $field ?>]'>
    <option value="light"<?php if($value == 'light'): ?> selected="" <?php endif; ?>><?php echo otfbmsg_e('Light'); ?></option>
    <option value="dark"<?php if($value == 'dark'): ?> selected="" <?php endif; ?>><?php echo otfbmsg_e('Dark'); ?></option>
  </select>
  <?php
}
function ottwitter_linkcolor_callback() {
  
  $settings = (array) get_option( 'ottwitter-plugin-settings' );
  $field = "ottwitter_link_color";
  if(esc_attr( $settings[$field] )) {
    $value = esc_attr( $settings[$field] ); 
  } else {
    $value = '#0084b4';
  }
  
  echo "<input type='text' size='40' name='ottwitter-plugin-settings[$field]' value='$value' />";
}
function ottwitter_width_callback() {
  
  $settings = (array) get_option( 'ottwitter-plugin-settings' );
  $field = "ottwitter_width";
  if(esc_attr( $settings[$field] )) {
    $value = esc_attr( $settings[$field] ); 
  } else {
    $value = 300;
  }
  
  echo "<input type='number' name='ottwitter-plugin-settings[$field]' value='$value' />";
}
function ottwitter_height_callback() {
  
  $settings = (array) get_option( 'ottwitter-plugin-settings' );
  $field = "ottwitter_height";
  if(esc_attr( $settings[$field] )) {
    $value = esc_attr( $settings[$field] ); 
  } else {
    $value = 500;
  }
  
  echo "<input type='number' name='ottwitter-plugin-settings[$field]' value='$value' />";
}