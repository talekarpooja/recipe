<?php
/*
Plugin Name: Wp-recipe Plugin
Plugin URI: https://www.wp-recipe.com
Author: InfiWebs
Author URI: https://www.infiwebs.com
Version: 1.0
Description: This is my first test plugin.
Text Domain: wp-recipe
*/

class WP_recipe{

  // Constructor
    function __construct() {

        add_action( 'admin_menu', array( $this, 'wpa_add_menu' ));
        register_activation_hook( __FILE__, array( $this, 'wpa_install' ) );
        register_deactivation_hook( __FILE__, array( $this, 'wpa_uninstall' ) );
    }

    /*
      * Actions perform at loading of admin menu
      */
    function wpa_add_menu() {

        add_menu_page( 'recipe', 'recipe', 'manage_options', 'recipe-dashboard', array(
                          __CLASS__,
                         'wpa_page_file_path'
                       ), plugins_url('images/wp-recipe-logo.png', __FILE__),'2.2.9');

        add_submenu_page( 'recipe-dashboard', 'recipe' . ' Dashboard', ' Dashboard', 'manage_options', 'recipe-dashboard', array(
                              __CLASS__,
                             'wpa_page_file_path'
                            ));

        add_submenu_page( 'recipe-dashboard', 'recipe' . ' All recipes', '<b style="color:#f9845b">All recipes</b>', 'manage_options', 'recipe-All recipes', array(
                              __CLASS__,
                             'wpa_page_file_path'
                            ));

        add_submenu_page( 'recipe-dashboard', 'recipe' . ' veg', '<b style="color:#f9845b">veg</b>', 'manage_options', 'recipe-veg', array(
                                                  __CLASS__,
                                                 'wpa_page_file_path'
                                                ));

        add_submenu_page( 'recipe-dashboard', 'recipe' . 'Non veg', '<b style="color:#f9845b">Non veg</b>', 'manage_options', 'recipe-Non veg', array(
                                                                                          __CLASS__,
                                                                                         'wpa_page_file_path'
                                                                                        ));
    }

    /*
     * Actions perform on loading of menu pages
     */
    function wpa_page_file_path() {



    }

    /*
     * Actions perform on activation of plugin
     */
    function wpa_install() {



    }

    /*
     * Actions perform on de-activation of plugin
     */
    function wpa_uninstall() {



    }

}

new WP_recipe();

/**
 * Register meta boxes.
 */
function hcf_register_meta_boxes() {
    add_meta_box( 'hcf-1', __( 'Hello recipe', 'hcf' ), 'hcf_display_callback', 'post' );
}
add_action( 'add_meta_boxes', 'hcf_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function hcf_display_callback( $post ) {
    echo "Ingrediants";


}
add_action('admin_init','WP_recipe_codes_init_func');

function wp_recipe_codes_init_func() {
  add_meta_box('WP_recipe_info','Recipes','wp_recipe_metabox_func','post','normal','low');

}
   function wp_recipe_metabox_func() {
    ?>
    <div class="input_fields_wrap">
      <a class="add_field_button  button=secondary"> Ingrediants </a>
    <div> <input type="text" name="mytext()"> </div>
  </div>

    <div class="input_fields_wrap">
    <a class="add_field_button  button=secondary"> Neutritions </a>
  <div> <input type="text" name="mytext()"> </div>
  </div>

    <div class="input_fields_wrap">
    <a class="add_field_button  button=secondary"> Fats </a>
  <div> <input type="text" name="mytext()"> </div>
  </div>

  <div class="input_fields_wrap">
    <a class="add_field_button  button=secondary"> Carbohydrates </a>
  <div> <input type="text" name="mytext()"> </div>
  </div>

  <div class="input_fields_wrap">
    <a class="add_field_button  button=secondary"> category </a>
  <div> <input type="text" name="mytext()"> </div>
  </div>

<?php
   }
