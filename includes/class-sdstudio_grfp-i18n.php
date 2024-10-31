<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sdstudio.top
 * @since      1.0.0
 *
 * @package    Sdstudio_grfp
 * @subpackage Sdstudio_grfp/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sdstudio_grfp
 * @subpackage Sdstudio_grfp/includes
 * @author     Serhii Dudchenko <SDStudiovtop@gmail.com>
 */
class Sdstudio_grfp_i18n {


// Вот здесь все нафиг удаляем и юзаем функцию
// https://misha.blog/wordpress/load_plugin_textdomain.html
// В главном файле плагина

    public function load_plugin_textdomain() {
            load_plugin_textdomain( 'sdstudio_grfp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

}
 
