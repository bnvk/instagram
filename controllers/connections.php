<?php
class Connections extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
			
		$this->load->library('instagram_api');

		$this->module_site = $this->social_igniter->get_site_view_row('module', 'instagram');
	}
			
	function index()
	{
		// Is Logged In
		if ($this->social_auth->logged_in()) redirect('connections/instagram/add');
		
		redirect($this->instagram_api->instagramLogin());
	}

	function add()
	{
		if (!$this->social_auth->logged_in()) redirect('connections/instagram');	
		
		$check_connection = $this->social_auth->check_connection_user($this->session->userdata('user_id'), 'instagram', 'primary');
		
		// Is this account connected			
		if ($check_connection)
		{		
			$this->session->set_flashdata('message', "You already have a Instagram account connected");
			redirect(connections_redirect(config_item('instagram_connections_redirect')), 'refresh');
		}
		else
		{
			// Not Set go to Instagram
			if (!isset($_REQUEST['code']))
			{
				redirect($this->instagram_api->instagramLogin());
			}	
			else
			{	
		
			}
		}	
	}
	
	// Returns, Store Cookies
	function callback()
	{
		// Not Set go to Instagram
		if (!isset($_REQUEST['code']))
		{
			redirect($this->instagram_api->instagramLogin());
		}	
		else
		{
			// Get Access Token
			$instagram_user = $this->instagram_api->authorize($_REQUEST['code']);
				
			// Check & Add
			if ($check_connection = $this->social_auth->check_connection_user_id($instagram_user->user->id, "instagram"))
			{
			 	$this->session->set_flashdata('message', 'This Instagram account is already connected to another user');
			 	redirect(connections_redirect(config_item('instagram_connections_redirect')), 'refresh');
			}
			else
			{	
				// Check for New User
			
					
				// Add Connection
		   		$connection_data = array(
		   			'site_id'				=> $this->module_site->site_id,
		   			'user_id'				=> $this->session->userdata('user_id'),
		   			'module'				=> 'instagram',
		   			'type'					=> 'primary',
		   			'connection_user_id'	=> $instagram_user->user->id,
		   			'connection_username'	=> $instagram_user->user->username,
		   			'auth_one'				=> $instagram_user->access_token
		   		);

				$connection = $this->social_auth->add_connection($connection_data);

				$this->social_auth->set_userdata_connections($this->session->userdata('user_id'));

				$this->session->set_flashdata('message', 'Instagram account connected');

			 	redirect(connections_redirect(config_item('instagram_connections_redirect')), 'refresh');
	
			}

		
		}
		
		/* DataModel from $this->instagram_api->authorize(); 
		
			stdClass Object ( 
				[access_token] => 140118.c88bd345sf913d8834451b9a2285de87b07acb 
				[user] => stdClass Object ( 
					[username] => brennannovak 
					[bio] => 
					[website] => http://brennannovak.com 
					[profile_picture] => http://images.instagram.com/profiles/profile_140118_75sq_1288572577.jpg 
					[full_name] => Brennan Novak 
					[id] => 140118 
				) 
			)		
		*/

	}
	
}