<?php
/*
Plugin Name: pjax menu
Plugin URI: https://gitorious.org/pjax-menu
Description: Adds ajax requests to your nav menu so you can navigate your site without full page refreshes. Only the content data needs to be loaded. Uses jquery-pjax.
Version: 0.2
Author: Dobie Gillis
Author URI: http://nikolas.us.to/
License: AGPL3
*/
/*  Copyright 2014 Dobie Gillis (email: horses@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('PJAXMENU_PLUGIN_URL', plugin_dir_url( __FILE__ ));

class PjaxMenu {
	public static function loadScripts() {
		wp_enqueue_script('pjax', PJAXMENU_PLUGIN_URL . 'pjax/jquery.pjax.js', array('jquery'));
		wp_enqueue_script('pjax_menu', PJAXMENU_PLUGIN_URL . 'pjax_menu.js', array('jquery', 'pjax'));
	}

	public static function getCustomPjaxTemplate() {
		if (array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']) {
			include('pjax_template.php');
			exit;
		}
	}
}

add_action('get_header', 'PjaxMenu::loadScripts');
add_filter('template_redirect', 'PjaxMenu::getCustomPjaxTemplate');
