<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;
use Carbon_Fields\Widget;
//use Sdstudio_grfp_i18n
// И подключаем перевод
// START
function myplugin_load_textdomain() {
//  load_plugin_textdomain( 'sdstudio_grfp', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
  load_plugin_textdomain( 'sdstudio_grfp', false, plugins_url('sdstudio_grfp/languages/')  ); 
}
add_action( 'plugins_loaded', 'myplugin_load_textdomain' );
// END
// И подключаем перевод
//s(basename( dirname( __FILE__ ) ) . '/languages');
//vdd( dirname(__FILE__) . "/" );
//vdd( plugins_url('sdstudio_grfp/languages/')  );

add_action( 'carbon_fields_register_fields', 'crb_attach_SDStudio_Carbon_Fields_options' );
function crb_attach_SDStudio_Carbon_Fields_options() {
	global $test_translite;
		Container::make( 'post_meta', 'sds_google_reviews_graber', __( 'Грабер отзыва из Google Reviews', 'sdstudio_grfp' ) )
//		Container::make( 'post_meta', 'sds_google_reviews_graber', $test_translite )
		->show_on_post_type('sds_google_reviews')
		->add_fields( array(
		
        		Field::make( 'text', 'sds_google_reviews_link_otzuv', ' ' ) 
        		->set_attribute( 'data-info', 'sds_google_reviews_link_otzuv' )     
        		->set_attribute( 'placeholder', __( 'Например https://goo.gl/maps/...' , 'sdstudio_grfp' ))

        ->help_text( __('Ссылка на отзыв клиента о работе, как её получить подробно описано <a href="https://techblog.sdstudio.top/blog/plugin-sdstudio-google-reviews-for-portfolio" target="_blank">здесь</a> <br> <a href="#" class="a-btn" id="sds_google_reviews_button_graber">
						<span class="a-btn-symbol">~</span>
						<span class="a-btn-text">Получить отзыв</span> 
						<span class="a-btn-slide-text">Нажмите для получения отзыва из Google Reviews</span>
<span class="a-btn-slide-icon"></span>
					</a>' , 'sdstudio_grfp' ))
		        ->set_width( 70 ),
		        Field::make( 'html', 'sds_google_reviews_button' )
    ->help_text( __('Перед тем как начать парсинг, убедитесь что ссылка на шаринг отзыва вставлена' , 'sdstudio_grfp' ))
    		        ->set_width( 30 ),
        
		));
		
		
		//////
		
		
		
				Container::make( 'post_meta', 'sds_google_reviews_post_options', __('Отзыв клиента', 'sdstudio_grfp' ) )
			->show_on_post_type('sds_google_reviews')
			->add_fields( array(
			
	//        ->set_help_text( 'Введите ссылку страницы, на которую должен попасть пользователь при ВЫХОДЕ с админки сайта или из личного кабинета.' )
	        Field::make( 'rich_text', 'sds_google_reviews__otzuv', __('Здесь будет загружен отзыв клиента', 'sdstudio_grfp' ) )
//	        ->set_attribute( 'placeholder', 'Введите отзыв' )
	        ->set_attribute( 'data-info', 'sds_google_reviews__otzuv' )
		    	->set_rows( 6 )
		        ->set_width( 70 ),
			Field::make( 'text', 'sds_google_reviews_image_url', __('Ссылка на аватар', 'sdstudio_grfp' ) ) 	
		    ->help_text( __('Фото из профиля Google человека оставившего отзыв (размер 120x120px)<br><img class="sds_google_reviews_image_url_INSERT" src="" style="text-align: center;min-width: 100%;padding-top: 15px;">', 'sdstudio_grfp' ) )
		    ->set_attribute( 'placeholder', __('Ссылка будет вставлена автоматически', 'sdstudio_grfp' ) )     
        	->set_attribute( 'data-info', 'sds_google_reviews_image_url' )  
        	->set_width( 30 ),

        
    	) );
		

		/////
	    Container::make( 'post_meta', 'sds_google_reviews_other_options', __('Свойства отзыва', 'sdstudio_grfp' ) )
			->show_on_post_type('sds_google_reviews')
			->add_fields( array(
			
		Field::make( 'text', 'sds_google_reviews_client_name', __('Имя клиента оставившего отзыв', 'sdstudio_grfp' ) ) 	
    		->set_attribute( 'placeholder', __('Имя будет вставлено автоматически', 'sdstudio_grfp' ) )     
        	->set_attribute( 'data-info', 'sds_google_reviews_client_name' )    
        	->set_width( 20 ),
        Field::make( 'text', 'sds_google_reviews_stars', __('Количество звезд', 'sdstudio_grfp' ) )
	        ->set_attribute( 'placeholder', __('Количество звезд будет вставлено автоматически', 'sdstudio_grfp' ) )     	->set_attribute( 'data-info', 'sds_google_reviews_stars' ) 
	->set_width( 20 ),
		Field::make( 'text', 'sds_google_reviews_link_site', __('Ссылка на сайт', 'sdstudio_grfp' ) ) 	
			->set_attribute( 'placeholder', __('Заполняется по желанию' , 'sdstudio_grfp' ))    
        	->set_width( 20 ),
        Field::make( 'text', 'sds_google_reviews_id_this_portfolio', __('ID данного отзыва (поста)' , 'sdstudio_grfp' ))
        	->set_attribute( 'placeholder', __('Не трогаем, ID появится после первого сохранения отзыва', 'sdstudio_grfp' ) )    
        	->set_width( 20 ),
    	) );
    	
    	/////
    	
    	Container::make( 'post_meta', 'sds_google_reviews_stars_html', __('Рейтинг, звезды в html' , 'sdstudio_grfp' ))
			->show_on_post_type('sds_google_reviews')
			->add_fields( array(
			        Field::make( 'text', 'sds_google_reviews_stars_html', __('Количество звезд', 'sdstudio_grfp' ) )
	        ->set_attribute( 'placeholder', __('Поле будет заполнено автоматически при сохранении (публикации)', 'sdstudio_grfp' ) )
	     	->set_attribute( 'data-info', 'sds_google_reviews_stars_html' ),
			
		
		) );
		
        
}
        
			

