<?php
/**************************  http://guilhermewp.com.br/
  * Plugin Name: gwpexcerpt TinyMCE Excerpt
  * Description: Adiciona editor a resumos e campos
  * Author: GuilhermeWP
  * Author URI: http://guilhermewp.com.br/
  * Version: 1.0
  ****************************/
 
 function gwpexcerpt_activate_page_excerpt() {
   add_post_type_support('page', array('excerpt'));
 }
 add_action('init', 'gwpexcerpt_activate_page_excerpt');
 
 # Remove campos antigos e adiciona os novos
 function gwpexcerpt_replace_post_excerpt() {
   foreach (array("post", "page", "course") as $type) {
     remove_meta_box('postexcerpt', $type, 'normal');
     add_meta_box('postexcerpt', __('Excerpt'), 'gwpexcerpt_create_excerpt_box', $type, 'normal');
   }
 }
 add_action('admin_init', 'gwpexcerpt_replace_post_excerpt');
 
 function gwpexcerpt_create_excerpt_box() {
   global $post;
   $id = 'excerpt';
   $excerpt = gwpexcerpt_get_excerpt($post->ID);
 
   wp_editor($excerpt, $id);
 }
 
 function gwpexcerpt_get_excerpt($id) {
   global $wpdb;
   $row = $wpdb->get_row("SELECT post_excerpt FROM $wpdb->posts WHERE id = $id");
   return $row->post_excerpt;
 }
// Essentials
include_once 'includes/config.php';
include_once 'includes/init.php';

// Register & Functions
include_once 'includes/register.php';
include_once 'includes/func.php';
include_once 'includes/ratings.php';
// Customizer
include_once 'includes/customizer/customizer.php';
include_once 'includes/customizer/css.php';
include_once 'includes/vibe-menu.php';
include_once 'includes/notes-discussions.php';
if ( function_exists('bp_get_signup_allowed')) {
    include_once 'includes/bp-custom.php';
}

include_once '_inc/ajax.php';

//Widgets
include_once('includes/widgets/custom_widgets.php');
if ( function_exists('bp_get_signup_allowed')) {
 include_once('includes/widgets/custom_bp_widgets.php');
}
include_once('includes/widgets/advanced_woocommerce_widgets.php');
include_once('includes/widgets/twitter.php');
include_once('includes/widgets/flickr.php');

//Misc
include_once 'includes/extras.php';
include_once 'includes/tincan.php';
include_once 'setup/wplms-install.php';

// Options Panel
get_template_part('vibe','options');
