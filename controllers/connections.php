<?php
class Connections extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
/*
		if (config_item('facebook_enabled') == 'FALSE') redirect(base_url(), 'refresh');

		// Load Library
		$facebook_config = array(
			'client_id' 	=> config_item('facebook_app_id'),
			'client_secret'	=> config_item('facebook_secret_key'),
			'callback_url'	=> base_url().trim_slashes($this->uri->uri_string()),
			'access_token'	=> NULL
		);
*/			
		$this->load->library('instagram_api');

		//$this->module_site = $this->social_igniter->get_site_view_row('module', 'facebook');
	}
			
	function index()
	{
		
		redirect($this->instagram_api->instagramLogin());
	
	}
	
	// Returns, Store Cookies
	function callback()
	{
		
		
		$result = $this->instagram_api->authorize($_REQUEST['code']);
		
		print_r($result);


	}
	
}