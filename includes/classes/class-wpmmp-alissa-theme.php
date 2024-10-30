<?php

class Wpmmp_Alissa_Theme extends Wpmmp_Theme_Handler {

	protected $name = 'Coming Soon landing page';

	protected $description = 'Simple and beautiful coming soon landing page';

	protected $id = 'alissa';

	protected $path = '';

	protected $template_name = 'alissa-coming-soon';

	protected $settings_page = true;

	protected $settings_page_title = 'Coming soon theme';

	protected $settings_page_slug = 'c_soon_theme';

	function init() {

		$this->path =  WPMMP_PLUGIN_VIEW_DIRECTORY . 'themes/alissa-coming-soon/template.php';

		$this->init_settings();

		add_action( 'wp_ajax_nopriv_wpmmp_c_soon_store_email', array( $this, 'store_email' ) );
		add_action( 'wp_ajax_wpmmp_c_soon_store_email', array( $this, 'store_email' ) );
	
	}

	function save_settings( $tab ) {

		if ( $tab !== $this->settings_page_slug )
			return false;

		$settings = $this->get_settings();

		foreach ($_POST['settings'] as $key => $value) {
			$_POST['settings'][$key] = stripcslashes( $value );
		}

		$settings = $_POST['settings'];

		if ( isset( $_POST['settings']['subscribe_form'] ) )
			$settings['subscribe_form'] = true;
		else
			$settings['subscribe_form'] = false;

		update_option( 'wpmmp_coming_soon_theme', $settings );

	}

	function store_email() {

		usleep( 500 );

		error_reporting(0);

		if ( ! wp_verify_nonce( $_POST['wpmmp_email_manager_nonce'], 
			'wpmmp_email_manager_nonce' ) ) {
		}

		if ( ! isset( $_POST['name'] ) )
			$_POST['name'] = '';

		$email = $_POST['email'];

		$name = $_POST['name'];

		if ( ! is_email( $email ) ) {

			$response = array(
					'valid' => 0,
					'message' => 'Error ' . ' - ' .  'Invalid email address'
				);

			exit( json_encode( $response ) );

		}

		wpmmp_include( '/libs/MCAPI.class.php' );

		$settings = $this->get_settings();

		$api_key = $settings['mailchimp_api'];
		
		$list_id = $settings['mailchimp_list'];

		$api = new Wpmmp_MCAPI( $api_key );

		list($fname,$lname) = preg_split('/\s+(?=[^\s]+$)/', $name, 2); 
		
		$merge_vars = array(
			'FNAME' => $fname, 
			'LNAME' => $lname
		);

		$retval = $api->listSubscribe( $list_id, $email, $merge_vars, 'html' );

		if( $api->errorCode ) {

			$response = array(
					'valid' => 0,
					'message' => 'Error ' . ' - ' .  $api->errorMessage
				);

			exit( json_encode( $response ) );

		}

		$response = array(
					'valid' => 1,
					'message' => 'Email submitted successfully!'
				);

		exit( json_encode( $response ) );

	}

	function init_settings() {

		$options = array(
				'logo' => get_bloginfo( 'name' ),
				'mailchimp_api' => '',
				'mailchimp_list' => '',
				'header_tagline' => 'Tel: <span>0039 123 45 789</span> | Skype: <span>info@domain.it</span>',
				'subscribe_form' => true,
				'form_heading' => 'SUBSCRIBE TO OUR NEWSLETTER',
				'form_sub_heading' => "Sign up now to our newsletter and you'll be one of the first to know when the site is ready:",
				'form_btn_text' => 'Subscribe',
				'form_field_text' => 'Enter your email...',
				'btn_fb' => site_url(),
				'btn_twitter' => site_url(),
				'btn_dribble' => site_url(),
				'btn_gplus' => site_url(),
				'btn_pin' => site_url(),
				'btn_flickr' => site_url(),
				'bg_1' => plugins_url( 'assets/img/backgrounds/1.jpg' , $this->path ),
				'bg_2' => plugins_url( 'assets/img/backgrounds/2.jpg' , $this->path ),
				'bg_3' => plugins_url( 'assets/img/backgrounds/3.jpg' , $this->path ),
			);


		if ( ! get_option( 'wpmmp_coming_soon_theme'  ) )
			update_option( 'wpmmp_coming_soon_theme', $options );

	}

	function get_settings() {return get_option( 'wpmmp_coming_soon_theme' );}

}
