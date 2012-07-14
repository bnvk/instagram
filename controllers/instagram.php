<?php
class Instagram extends Site_Controller
{
    function __construct()
    {
        parent::__construct();
	}
	
	function index()
	{		
		redirect();
	}
	
	/* Widgets */
	function widgets_recent_pictures($widget_data)
	{
        // Get Connection
   		if ($connection = $this->social_auth->check_connection_user(config_item('instagram_widgets_recent_pictures'), 'instagram', 'primary'))
   		{
			$this->load->library('instagram_api', $connection->auth_one);

			$widget_data['pictures'] = $this->instagram_api->getUserRecent($connection->connection_user_id);	
		}
		else
		{
			$widget_data['pictures'] = FALSE;
		}
		
		$this->load->view('widgets/recent_pictures', $widget_data);
	}	


}
