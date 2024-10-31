<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sdstudio.top
 * @since             1.0.0
 * @package           Sdstudio_grfp
 *
 * @wordpress-plugin
 * Plugin Name:       SDStudio Google Reviews for portfolio
 * Plugin URI:        https://techblog.sdstudio.top/blog/plugin-sdstudio-google-reviews-for-portfolio
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.2
 * Author:            s.dudchenko
 * Author URI:        https://sdstudio.top
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sdstudio_grfp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SDSTUDIO_GRFP_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sdstudio_grfp-activator.php
 */
function activate_sdstudio_grfp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sdstudio_grfp-activator.php';
	Sdstudio_grfp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sdstudio_grfp-deactivator.php
 */
function deactivate_sdstudio_grfp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sdstudio_grfp-deactivator.php';
	Sdstudio_grfp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sdstudio_grfp' );
register_deactivation_hook( __FILE__, 'deactivate_sdstudio_grfp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sdstudio_grfp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sdstudio_grfp() {

	$plugin = new Sdstudio_grfp();
	$plugin->run();

}
run_sdstudio_grfp();

/*add_action( 'plugins_loaded', 'true_load_plugin_textdomain' );
 
function true_load_plugin_textdomain() {
	load_plugin_textdomain( 'sdstudio_grfp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}*/

add_action( 'plugins_loaded', 'true_plugin_language' );
 
function true_plugin_language() {
	load_plugin_textdomain( 'sdstudio_grfp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
/**
* 
* 
* @__Post_Type_SDStudio_Google_Reviews
* 
* 
*/





function cptui_register_my_cpts_sds_google_reviews() {

	/**
	 * Post Type: SDStudio Google Reviews.
	 */

	$labels = array(
		"name" => __( "SDStudio Google Reviews", "custom-post-type-ui" ),
		"singular_name" => __( "SDStudio Google Review", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "SDStudio Google Reviews", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "sds_google_reviews", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-googleplus",
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "author", "page-attributes", "post-formats" ),
//		"supports" => array( "title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "revisions", "author", "page-attributes", "post-formats" ),
		"taxonomies" => array( "category_google_reviews" ),
	);

	register_post_type( "sds_google_reviews", $args );
}

add_action( 'init', 'cptui_register_my_cpts_sds_google_reviews' );

/* Удаляем поддержку редактора */
/*add_action('init', 'my_rem_editor_from_post_type');
function my_rem_editor_from_post_type() {
    remove_post_type_support( 'sds_google_reviews', 'editor' );
}
*/
/**
* 
* 
* @__Taxonomy_Google_Reviews_Categories
* 
* 
*/

function cptui_register_my_taxes_category_google_reviews() {

	/**
	 * Taxonomy: Google Reviews Categories.
	 */

	$labels = array(
		"name" => __( "Google Reviews Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Google Reviews Category", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Google Reviews Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'category_google_reviews', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "category_google_reviews",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		);
	register_taxonomy( "category_google_reviews", array( "sds_google_reviews" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_category_google_reviews' );


/**
* @_Carbon_Fields
*/
//$test_translite = esc_html__( 'Грабер отзыва из Google Reviews', 'sdstudio_grfp' );

require_once plugin_dir_path( __FILE__ ) . 'Carbon Fields/vendor/autoload.php';
require_once plugin_dir_path( __FILE__ ) . 'Carbon Fields/SDStudio_Carbon_Fields_Functions.php';

/**
* @_php_html_parser
*/
require_once plugin_dir_path( __FILE__ ) . 'php-html-parser-master/vendor/autoload.php';
use PHPHtmlParser\Dom;


// Отлавливаем ошибки  ajax
// https://rogodessa.ru/wordpress/otlavlivaem-oshibki-ajax-v-wordpress
if( WP_DEBUG && WP_DEBUG_DISPLAY && (defined('DOING_AJAX') && DOING_AJAX) ){
    @ ini_set( 'display_errors', 1 );
}

//require_once plugin_dir_path( __FILE__ ) . 'php-html-parser-master/index.php';
//https://wordpress.stackexchange.com/questions/24235/how-can-i-run-ajax-on-a-button-click-event

// aJax

/* 
add_action('in_admin_header', 'my_ajax_button');

function my_ajax_button() {
    echo '<input type="submit_sds_google_reviews_button_graber" name="sds_google_reviews_button_graber" id="sds_google_reviews_button_graber" class="button sds_google_reviews_button_graber button-large" value="Спарсить отзыв!">';
}*/

add_action('admin_head', 'ajax_php_html_parser_javascript');

function ajax_php_html_parser_javascript() {
	// ПЕРЕВОД
	// Loader
	$swal_loader_alert_title = __('Получаем отзыв Google Reviews', 'sdstudio_grfp' );
	$swal_loader_html_title = __('После получения отзыва, данное окно будет закрыто автоматически, так же Вы увидите всплывающее окно с информацией о успешном (или не совсем успешном) получении отзыва.', 'sdstudio_grfp' );
	// Success
	$swal_success_alert_title = __('Готово!', 'sdstudio_grfp' );
	$swal_success_alert_text = __('Поздравляем. Отзыв был удачно получен.', 'sdstudio_grfp' );
	// Error
	$swal_error_alert_title = __('Ошибка', 'sdstudio_grfp' );
	$swal_error_alert_text = __('Пожалуйста убедитесь в правильности введенного адреса.', 'sdstudio_grfp' );
?>
<div id="sdstudio_grfp_translite">
<span data-swal_loader_alert_title="<?php echo $swal_loader_alert_title ?>"></span>
<span data-swal_loader_html_title="<?php echo $swal_loader_html_title ?>"></span>

<span data-swal_success_alert_title="<?php echo $swal_success_alert_title ?>"></span>
<span data-swal_success_alert_text="<?php echo $swal_success_alert_text ?>"></span>

<span data-swal_error_alert_title="<?php echo $swal_error_alert_title ?>"></span>
<span data-swal_error_alert_text="<?php echo $swal_error_alert_text ?>"></span>
</div>
<script type="text/javascript" >
jQuery(document).ready(function($) {

// Translite
var swal_loader_alert_title = $('[data-swal_loader_alert_title]').attr('data-swal_loader_alert_title');
var swal_loader_html_title = $('[data-swal_loader_html_title]').attr('data-swal_loader_html_title');
var swal_success_alert_title = $('[data-swal_success_alert_title]').attr('data-swal_success_alert_title');
var swal_success_alert_text = $('[data-swal_success_alert_text]').attr('data-swal_success_alert_text');
var swal_swal_error_alert_title = $('[data-swal_error_alert_title]').attr('data-swal_error_alert_title');
var swal_swal_error_alert_text = $('[data-swal_error_alert_text]').attr('data-swal_error_alert_text');


$.ajax({
//    url: uri,
    cache: false,
    beforeSend: function(){
        $('#image').show();
    },
    complete: function(){
        $('#image').hide();
    },
    success: function(html){
       $('.info').append(html);
    }
});


    $('#sds_google_reviews_button_graber').click(function(){
    	event.preventDefault();
    	
	//////////////////////////////    	
	/// sweetalert2 START
    let timerInterval
	Swal.fire({
//	  title: 'Получаем отзыв Google Reviews',
	  title: swal_loader_alert_title,
//	  html: 'После получения отзыва, данное окно будет закрыто автоматически, так же Вы увидите всплывающее окно с информацией о успешном (или не совсем успешном) получении отзыва.',
	  html: swal_loader_html_title,
	//  timer: 2000,

	// Отображаем прелоадер
	  onBeforeOpen: () => {
	    Swal.showLoading()
	/*    timerInterval = setInterval(() => {
	      Swal.getContent().querySelector('strong')
	        .textContent = Swal.getTimerLeft()
	    }, 100)*/
	  },
	  
	  onClose: () => {
	    clearInterval(timerInterval)
	  }
	});
	/// sweetalert2 END
	//////////////////////////////
    	
    	// Захватываем линк на отзыв
    	var sds_google_reviews_link_otzuv = $('[data-info="sds_google_reviews_link_otzuv"]').val();
//     		console.log(sds_google_reviews_link_otzuv);
        var data = {
            action: 'php_html_parser',
            jquery_post: sds_google_reviews_link_otzuv
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
//            alert('Got this from the server: ' + response);
			var data = response;
			var FullData = data.split("||");            
//            console.log(FullData);
            
            // Отличная функция для того что бы сделать все первые буквы заглавными
			// http://qaru.site/questions/60696/capitalize-words-in-string/420068#420068
			String.prototype.capitalize = function() {
			    return this.replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
				// Usage
				// string = string.capitalize();
			};
            
                var OtzuvStars = FullData[3];
                if (OtzuvStars == 5) {
                  var starRatingHTML = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                } else if (OtzuvStars == 4) {
                  var starRatingHTML = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                } else if (OtzuvStars == 3) {
                  var starRatingHTML = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                } else if (OtzuvStars == 2) {
                  var starRatingHTML = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                } else {
                  var starRatingHTML = "<i class='fa fa-star' aria-hidden='true'></i>";
                }



            // Вставляем имя клиента
            $('[data-info="sds_google_reviews_client_name"]').val(FullData[0].capitalize());
            $('[name="post_title"]').val(FullData[0].capitalize());
            $('textarea#post-title-0').text(FullData[0].capitalize());
            $('label#title-prompt-text').remove();
            // Вставляем фото
            $('[data-info="sds_google_reviews_image_url"]').val(FullData[1]);
            $('.sds_google_reviews_image_url_INSERT').attr('src',FullData[1]);
            // Отзыв
            // Очищаем контент в редакторе
            tinyMCE.activeEditor.setContent("");
//          // Вставляем свой текст в текестовый редактор
            tinymce.activeEditor.execCommand('mceInsertContent', false, FullData[2]);
            // Звезды
            $('[data-info="sds_google_reviews_stars"]').val(FullData[3]);
            $('[data-info="sds_google_reviews_stars_html"]').val(starRatingHTML);
	////////////////////////////// 
//	var sdstudio_grfp['Error'] = __('Пожалуйста убедитесь в правиельности введенного адреса.'); 
//	, 'sdstudio_grfp' )   	
	/// sweetalert2 START            
            Swal.fire({
			  position: 'center',
			  type: 'success',
//			  title: 'Готово!',
			  title: swal_success_alert_title,
//			  text:'Поздравляем. Отзыв был удачно получен.',
			  text:swal_success_alert_text,
			  showConfirmButton: false,
			  timer: 2000
			});
	/// sweetalert2 END
	//////////////////////////////    	
        }).fail(function(xhr, status, error) {
       	//////////////////////////////    	
	/// sweetalert2 START            
            Swal.fire({
			  position: 'center',
			  type: 'error',
//			  title: 'Ошибка',
			  title: swal_swal_error_alert_title,
//			  text:'Пожалуйста убедитесь в правильности введенного адреса.',
			  text:swal_swal_error_alert_text,
//			  text:sdstudio_grfp['Error'],
			  showConfirmButton: false,
			  timer: 3000
			});
	/// sweetalert2 END
	//////////////////////////////  
   		 })
    });

});
</script>
<?php
}

add_action('wp_ajax_php_html_parser', 'php_html_parser');


function php_html_parser() {
     global $wpdb; // this is how you get access to the database
     $jquery_post = $_POST['jquery_post'];
    
//    echo $jquery_post;

/**
* 
* @ПАРСИНГ_КОНТЕНТА 
* 
*/

	$dom = new Dom;
	$dom->setOptions([
		'removeScripts' => false, // Отменяем удаление всех скриптов из тела страницы
	]);

	// Узнаем полную ссылку
	// https://bit.ly/2LSUhfL
	// START
	//	$Google_Revievs_short_url = 'https://goo.gl/maps/3UNePrxMqXc4iRiW8'; 
		$Google_Revievs_short_url = $jquery_post; 
		$headers = get_headers($Google_Revievs_short_url, 1); 
		$Google_Reviews_url = $headers['Location'];
	// END

	// will not have whitespaceTextNode set to false.
	//$dom->load('https://goo.gl/maps/3UNePrxMqXc4iRiW8'); 
	$dom->load($Google_Reviews_url); 

	$html = $dom->outerHtml;
//	echo $html;

// ПОЛУЧЕНИЕ ОСНОВНОГО КОНТЕНТА
// 1️⃣ - Имя клиента
// http://qaru.site/questions/177209/split-string-in-javascript-and-detect-line-break
	$sds_grfp_ClientName = $dom->find('meta')[5];
	$meta_tag = $sds_grfp_ClientName->getTag();
	$sds_grfp_ClientName = $sds_grfp_ClientName->getAttribute('content'); // "foo"
	// Вычленяем текст между кавычками
	$sds_grfp_ClientName = preg_match('#\((.*?)\)#', $sds_grfp_ClientName, $match);
	$sds_grfp_ClientName = $match[1];	
	
//	echo $sds_grfp_ClientName; 
	
// 2️⃣ - Фото (аватар)
	$sds_grfp_Photo = explode("googleusercontent.com", $html, 7);
	$sds_grfp_Photo = explode("photo.jpg", $sds_grfp_Photo[4]);
	$sds_grfp_Photo = "https://lh3.googleusercontent.com".$sds_grfp_Photo[0]."photo.jpg";
//	echo(); 	
	
	
//	echo "<hr>";	
//	echo "<img src=\"".$sds_grfp_Photo."\" />" ; 	
	
// 1️⃣ - Отзыв
// http://qaru.site/questions/177209/split-string-in-javascript-and-detect-line-break
	$sds_grfp_review = $dom->find('meta')[11];
	$meta_tag = $sds_grfp_review->getTag();
	$sds_grfp_review = $sds_grfp_review->getAttribute('content'); // "foo"
	// Вычленяем текст между кавычками
//	$sds_grfp_review = preg_match('/"([^"]+)"/', $sds_grfp_review, $m);
	//
	// Убираем текст до первых кавычек "
	$sds_grfp_review = strstr($sds_grfp_review, "\"");
	// Убираем текст от последних кавычек "
	$sds_grfp_review = substr($sds_grfp_review, 0, strrpos($sds_grfp_review, "\""));
	// Удаляем символ " который у нас появился в начале строки
	$sds_grfp_review = ltrim($sds_grfp_review, "\"");
	

	
	//
//	$sds_grfp_review = $m[1];	
	// Заменяем спец символ переноса строки на br
//	$sds_grfp_review = str_replace("&#10;","<br>", $sds_grfp_review); // "foo"
//	echo "<hr>";	
//	echo $sds_grfp_review; 
	
// 2️⃣ - Количество звезд	
	$sds_grfp_stars = $dom->find('meta')[11];
	$meta_tag = $sds_grfp_stars->getTag();
	$sds_grfp_stars = $sds_grfp_stars->getAttribute('content'); // "foo"
$sds_grfp_stars = explode(" ", $sds_grfp_stars, 2);
$sds_grfp_stars = $sds_grfp_stars[0];
//$sds_grfp_stars = substr_count($sds_grfp_stars,'☆');
// И узнаем сколько унас звезд у отзыва
$sds_grfp_stars = substr_count($sds_grfp_stars,'★');
//	$sds_grfp_stars = mb_strlen($sds_grfp_stars, 'utf-8');
//	echo "<hr>";
//	echo mb_strlen($sds_grfp_stars, 'utf-8');
//	print $sds_grfp_stars; 


// Передаем все нужные данные
$sds_grfp_FULL = $sds_grfp_ClientName."||".$sds_grfp_Photo."||".$sds_grfp_review."||".$sds_grfp_stars;


echo $sds_grfp_FULL;

     exit(); 
}


/**
* 
* @info 2 - Изменить описание "Изображение записи" для информирования о том что оно и так будет установлено
* 
*/

	/** Use "Featured Image" Box As A Custom Box **/
	function ftzo_tennis_player_image_box() {   
	    remove_meta_box('postimagediv', 'sds_google_reviews', 'side');
	    add_meta_box('postimagediv', __('Если Вы не планируете использовать свое изображение человека оставившего отзыв, пожалуйста не трогайте данную опцию. При сохранении отзыва автоматически будет установлено изображение из поля "Ссылка на аватар"', 'sdstudio_grfp' ), 'post_thumbnail_meta_box', 'sds_google_reviews', 'side');

	}
	add_action('do_meta_boxes', 'ftzo_tennis_player_image_box');

	/** Change "Featured Image" box Link Text **/
	function custom_admin_post_thumbnail_html( $content ) {
	    global $post;
	    
	    if($post->post_type == 'sds_google_reviews')
	    {
	//    	Если Вы не планируете использовать фотографию игрока, пожалуйста не трогайте данную опцию
	        $content = str_replace( __( 'Set featured image' ), __( 'Upload dat Image' ), $content);
	        $content = str_replace( __( 'Remove featured image' ), __( 'Remove dat image' ), $content);
	    }

	    return $content;
	}
	add_filter( 'admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html' );


/**
* 
* @info 3 - Изображение записи применяем аватар клиента
* https://www.wpexplorer.com/wordpress-featured-image-url/
*/

//$post_id = '';
	
global $post;
global $wpdb;
$starRating = '';
if ( !empty($_POST)){	

	 // Функция срабатывает при обновлении и сохранении игроков
	 	
//		global $post;
//echo $post->ID;
//	 $post_id = get_the_ID();
	if ($_POST['post_type'] == "sds_google_reviews"){
		
//		$title = sanitize_text_field($_POST['title']);
//		update_post_meta($post->ID, 'title', $title);
		
	$_POST[carbon_fields_compact_input]['_sds_google_reviews_id_this_portfolio'] = sanitize_text_field($_POST[post_ID]);
	$sds_google_reviews__otzuv = sanitize_text_field($_POST[carbon_fields_compact_input]['_sds_google_reviews__otzuv']);
	$sds_google_reviews_stars = sanitize_text_field($_POST[carbon_fields_compact_input]['_sds_google_reviews_stars']);
	
//	d($_POST);
	                if ($sds_google_reviews_stars  == 5) {
                  $starRating = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                } else if ($sds_google_reviews_stars  == 4) {
                  $starRating = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                } else if ($sds_google_reviews_stars  == 3) {
                  $starRating = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                } else if ($sds_google_reviews_stars  == 2) {
                  $starRating = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                } else {
                  $starRating = "<i class='fa fa-star' aria-hidden='true'></i>";
                }
                
                
//      vdd($sds_google_reviews_stars);
$_POST[content] = "<div>".$sds_google_reviews__otzuv."</div>".$starRating;
//$_POST[content] .= $starRating;
//vdd($_POST);
	}
	
 	add_action( 'save_post_sds_google_reviews', 'save_sds_google_reviews' );
	function save_sds_google_reviews( $post_id ) {
	// 	https://www.gavick.com/blog/wordpress-automatically-set-post-featured-image
	// ================================================= 	
	// FUNCTION SAVE START ============================ 	

$sds_google_reviews_image_url = sanitize_text_field($_POST[carbon_fields_compact_input]['_sds_google_reviews_image_url']);
$sds_grfp_ClientName = sanitize_text_field($_POST[carbon_fields_compact_input]['_sds_google_reviews_client_name']);



//vdd($_POST);
// Add Featured Image to Post
$image_url        = $sds_google_reviews_image_url; // Define the image URL here
$image_name       = $sds_grfp_ClientName.".jpg" ;
$upload_dir       = wp_upload_dir(); // Set upload folder
$image_data       = file_get_contents($image_url); // Get image data
$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
$filename         = basename( $unique_file_name ); // Create image file name

// Check folder permission and define file location
if( wp_mkdir_p( $upload_dir['path'] ) ) {
    $file = $upload_dir['path'] . '/' . $filename;
} else {
    $file = $upload_dir['basedir'] . '/' . $filename;
}

// Create the image  file on the server
file_put_contents( $file, $image_data );

// Check image file type
$wp_filetype = wp_check_filetype( $filename, null );

// Set attachment data
$attachment = array(
    'post_mime_type' => $wp_filetype['type'],
    'post_title'     => sanitize_file_name( $filename ),
    'post_content'   => '',
    'post_status'    => 'inherit'
);

// Create the attachment
$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

// Include image.php
require_once(ABSPATH . 'wp-admin/includes/image.php');

// Define attachment metadata
$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

// Assign metadata to attachment
wp_update_attachment_metadata( $attach_id, $attach_data );

// And finally assign featured image to post
set_post_thumbnail( $post_id, $attach_id );

}
//	vdd($_POST);
//	vdd($post_id);
	//	}	
		
	// FUNCTION SAVE END =============================	
	// ================================================= 			
	}
	add_action( 'save_sds_google_reviews',  'save_sds_google_reviews_post', 30, 3 );
	add_action( 'admin_head-post.php', 'save_sds_google_reviews_post' );	




