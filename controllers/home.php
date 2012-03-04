<?php
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();

		$this->load->config('instagram');

		$this->module_site		= $this->social_igniter->get_site_view_row('module', 'instagram');		
		$this->check_connection = $this->social_auth->check_connection_user($this->session->userdata('user_id'), 'instagram', 'primary');

		$this->load->library('instagram_api', $this->check_connection->auth_one);

		$this->data['page_title'] = 'Instagram';
	}
	
	function friends()
	{
		if (!$this->check_connection) redirect(base_url().'settings/app');	
	
		$this->data['sub_title'] = 'Friends Pictures';
		
		$feed = $this->instagram_api->getUserFeed();
		
//		echo '<pre>';
//		print_r($feed);

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
}