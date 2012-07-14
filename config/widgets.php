<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Instagram : Widgets
* Author: 		Brennan Novak
* 		  		contact@social-igniter.com
*         		@brennannovak
*          
* Project:		http://social-igniter.com/
* Source: 		http://github.com/socialigniter/instagram
*
* Description: 	Widgets in core install of Social Igniter Instagram App
*/

$config['instagram_widgets'][] = array(
	'regions'	=> array('sidebar','content','wide'),
	'widget'	=> array(
		'module'	=> 'instagram',
		'name'		=> 'Recent Pictures',
		'method'	=> 'run',
		'path'		=> 'widgets_recent_pictures',
		'multiple'	=> 'FALSE',
		'order'		=> '1',
		'title'		=> 'Recent Pictures',
		'content'	=> ''
	)
);