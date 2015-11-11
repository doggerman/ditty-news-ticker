<?php

/* --------------------------------------------------------- */
/* !Load the admin scrips - 2.0.1 */
/* --------------------------------------------------------- */

function mtphr_dnt_admin_scripts( $hook ) {

	global $typenow;

	if ( $typenow == 'ditty_news_ticker' ) {

		// Load scipts for the media uploader
		if(function_exists( 'wp_enqueue_media' )){
	    wp_enqueue_media();
		} else {
	    wp_enqueue_style('thickbox');
	    wp_enqueue_script('media-upload');
	    wp_enqueue_script('thickbox');
		}

		// Load the CodeMirror plugin
		wp_register_style( 'codemirror', MTPHR_DNT_URL.'assets/css/codemirror.css', false, MTPHR_DNT_VERSION );
		wp_enqueue_style( 'codemirror' );
		wp_register_script( 'codemirror', MTPHR_DNT_URL.'assets/js/codemirror.js', array('jquery'), MTPHR_DNT_VERSION, true );
		wp_enqueue_script( 'codemirror' );
		wp_register_script( 'codemirror-css', MTPHR_DNT_URL.'assets/js/codemirror/css.js', array('jquery'), MTPHR_DNT_VERSION, true );
		wp_enqueue_script( 'codemirror-css' );
		
		// Register the jQuery easing
		wp_register_script( 'jquery-easing', MTPHR_DNT_URL.'assets/js/jquery.easing.1.3.js', array('jquery'), MTPHR_DNT_VERSION, true );
		
		// Register Bootstrap
		wp_register_script( 'mtphr-dnt-affix', MTPHR_DNT_URL.'assets/js/mtphr-dnt-affix.js', array('jquery'), MTPHR_DNT_VERSION, true );
		
		// Load qTip
		wp_register_style( 'qtip', MTPHR_DNT_URL.'assets/qtip/jquery.qtip.min.css', false, MTPHR_DNT_VERSION );
		wp_enqueue_style( 'qtip' );
		wp_register_script( 'qtip', MTPHR_DNT_URL.'assets/qtip/jquery.qtip.min.js', array( 'jquery' ), MTPHR_DNT_VERSION, true );
		wp_enqueue_script( 'qtip' );
		
		// Load the news ticker scripts
		wp_register_script( 'ditty-news-ticker', MTPHR_DNT_URL.'assets/js/script-admin.js', array( 'jquery','jquery-ui-core','jquery-ui-sortable', 'jquery-easing', 'qtip', 'mtphr-dnt-affix' ), MTPHR_DNT_VERSION, true );
		wp_enqueue_script( 'ditty-news-ticker' );
		wp_localize_script( 'ditty-news-ticker', 'ditty_news_ticker_vars', array(
				'security' => wp_create_nonce( 'ditty-news-ticker' ),
				'img_title' => __( 'Upload or select an image', 'ditty-news-ticker' ),
				'img_button' => __( 'Use Image', 'ditty-news-ticker' )
			)
		);
	}
	
	// Load the icon font css
	wp_register_style( 'ditty-news-ticker-font', MTPHR_DNT_URL.'assets/fontastic/styles.css', false, MTPHR_DNT_VERSION );
	wp_enqueue_style( 'ditty-news-ticker-font' );

	// Load the plugin css
	wp_register_style( 'ditty-news-ticker', MTPHR_DNT_URL.'assets/css/style-admin.css', array('dashicons'), MTPHR_DNT_VERSION );
	wp_enqueue_style( 'ditty-news-ticker' );
}
add_action( 'admin_enqueue_scripts', 'mtphr_dnt_admin_scripts' );

