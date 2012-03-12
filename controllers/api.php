<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends Oauth_Controller
{
    function __construct()
    {
        parent::__construct();
        
		$this->load->config('instagram');

		$this->module_site = $this->social_igniter->get_site_view_row('module', 'instagram'); 
	}

    /* Install App */
	function install_get()
	{
		// Load
		$this->load->library('installer');
		$this->load->config('install');        

		// Settings & Create Folders
		$settings = $this->installer->install_settings('instagram', config_item('instagram_settings'));

		// Site
		$site = $this->installer->install_sites(config_item('instagram_sites'));
	
		if ($settings == TRUE)
		{
            $message = array('status' => 'success', 'message' => 'Yay, the Instagram was installed');
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Dang Instagram could not be uninstalled');
        }		
		
		$this->response($message, 200);
	}
	
	function media_comments_authd_get()
	{
		$check_connection = $this->social_auth->check_connection_user($this->oauth_user_id, 'instagram', 'primary');

		$this->load->library('instagram_api', $check_connection->auth_one);

		$comments = $this->instagram_api->mediaComments($this->get('id'));

		if ($comments)
		{
			if (count($comments->data))
			{
            	$message = array('status' => 'success', 'message' => 'Yay, Instagram found some comments', 'comments', $comments->data);
        	}
        	else
        	{
            	$message = array('status' => 'error', 'message' => 'No comments found, sad panda :(');        		
        	}
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Dang Instagram could not get comments');
        }		
		
		$this->response($message, 200);		
	}

}