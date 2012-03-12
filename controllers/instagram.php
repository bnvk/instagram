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
		//$this->render();	
	}


}
