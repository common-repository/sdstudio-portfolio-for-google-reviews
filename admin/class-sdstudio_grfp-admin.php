<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sdstudio.top
 * @since      1.0.0
 *
 * @package    Sdstudio_grfp
 * @subpackage Sdstudio_grfp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sdstudio_grfp
 * @subpackage Sdstudio_grfp/admin
 * @author     Serhii Dudchenko <SDStudiovtop@gmail.com>
 */
class Sdstudio_grfp_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sdstudio_grfp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sdstudio_grfp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sdstudio_grfp-admin.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'AnimatedButtons_style5', plugin_dir_url( __FILE__ ) . 'AnimatedButtons/css/style5.css' );
		
		
		wp_enqueue_style( 'sweetalert2_animate', plugin_dir_url( __FILE__ ) . 'sweetalert2/animate.min.css' );
		wp_enqueue_style( 'sweetalert2_styles', plugin_dir_url( __FILE__ ) . 'sweetalert2/sweetalert2.min.css' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sdstudio_grfp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sdstudio_grfp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sdstudio_grfp-admin.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script( 'sweetalert2_js', plugin_dir_url( __FILE__ ) . 'sweetalert2/sweetalert2.min.js');
//		wp_enqueue_script( 'sweetalert2_script', plugin_dir_url( __FILE__ ) . 'sweetalert2/script.js');

	}

}
