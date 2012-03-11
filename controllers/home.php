<?php
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();

		$this->load->config('instagram');

		$this->module_site		= $this->social_igniter->get_site_view_row('module', 'instagram');		
		$this->check_connection = $this->social_auth->check_connection_user($this->session->userdata('user_id'), 'instagram', 'primary');

		// Kinda Kludgy (user not setup) Redirect
		if (!$this->check_connection)
		{	
			$this->session->set_flashdata('message', 'Please connect your Instagram account before using the app');			
		
			redirect(base_url().'settings/connections');
		}
		else
		{
			$this->load->library('instagram_api', $this->check_connection->auth_one);
		}

		$this->data['page_title'] = 'Instagram';
	}
	
	function friends()
	{
		if (!$this->check_connection) redirect(base_url().'settings/app');	
	
		$this->data['sub_title'] = 'Friends Pictures';
		
		$feed = $this->instagram_api->getUserFeed();

		$this->data['feed'] = $feed;		
	
		$this->render();
	}
	
	function yours()
	{
		if (!$this->check_connection) redirect(base_url().'settings/app');	
	
		$this->data['sub_title'] = 'Your Pictures';
		
		$feed = $this->instagram_api->getUserRecent($this->check_connection->connection_user_id);

		$this->data['feed'] = $feed;		
	
		$this->render();
	}

	function likes()
	{
		if (!$this->check_connection) redirect(base_url().'settings/app');	
	
		$this->data['sub_title'] = 'Your Likes';
		
		$feed = $this->instagram_api->getUserLiked();


		$this->data['feed'] = $feed;		
	
		$this->render();
	}
}