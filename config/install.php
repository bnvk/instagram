<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Instagram : Install
* Author: 		Brennan Novak
* 		  		contact@social-igniter.com
*          
* Created: 		Brennan Novak
*
* Project:		http://social-igniter.com/
* Source: 		http://github.com/socialigniter/instagram
*
* Description: 	Install values for Instagram for Social Igniter 
*/

/* Settings */
$config['instagram_settings']['widgets'] 			= 'TRUE';
$config['instagram_settings']['categories'] 		= 'FALSE';
$config['instagram_settings']['enabled']			= 'TRUE';
$config['instagram_settings']['comments_per_page']	= '5';
$config['instagram_settings']['comments_allow']		= 'no';

$config['instagram_settings']['client_id']			= '';
$config['instagram_settings']['client_secret']		= '';

$config['instagram_settings']['social_login'] 		= 'TRUE';
$config['instagram_settings']['social_connection'] 	= 'TRUE';

$config['instagram_settings']['login_redirect']		= 'home/';
$config['instagram_settings']['connections_redirect']= 'settings/connections/';

/* Sites */
$config['instagram_sites'][] = array(
	'url'		=> 'http://instagr.am/', 
	'module'	=> 'instagram', 
	'type' 		=> 'remote', 
	'title'		=> 'Instagram', 
	'favicon'	=> 'http://instagram.com/static/images/favicon.ico'
);