<?php
class Instagram extends Site_Controller
{
    function __construct()
    {
        parent::__construct();       

		$this->load->library('instagram_api');
	}
	
	function index()
	{
		$this->data['page_title'] = 'Instagram';
		
		// Gets feed I see of ppl I follow 
		// $feed = $this->instagram_api->getUserFeed();	
		
		// Gets my photo feed
		$feed = $this->instagram_api->getUserRecent(140118);
		
		echo '<pre>';
		print_r($feed);
		echo '</pre>';
		
		//$this->render();	
	}


}
