<?php
/**
* @package topchartplugin
*/
/*
Plugin Name: Topchart Plugin
Plugin URI: www.google.com
Description: This is a music chart plugin where you can add custom music chart in your wordpress site.
Version: 1.0.0
Author: S.A Adnan
Author URI: www.shaki.tk
License: MIT
Text Domain: topchart 
*/
/*

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/


if (! defined('ABSPATH')) {
	die('Sorry, ask your mama for access');
}

class topchart_plugin
{
	function register() {
		add_action( 'admin_enqueue_scripts', array($this, 'enqueue') );
		add_action( 'admin_menu', array($this, 'add_admin_pages') );
		add_action( 'admin_menu', array($this, 'add_sub_menu') );
	}

	 public function add_admin_pages()
	 	{
	 		add_menu_page( 'Topchart Plugin', 'Top song chart', 'manage_options', 'top_chart', array($this, 'admin_index'), 'dashicons-editor-ol', null );
	 	}

	 public function add_sub_menu()
			{
				add_submenu_page( 'top_chart', 'Topchart Plugin', 'List Chart', 'manage_options', 'top_chart', array($this, 'admin_index') );
				add_submenu_page( 'top_chart', 'Add song', 'Add Song', 'manage_options', 'add_song', array($this, 'add_song') );
				add_submenu_page( 'top_chart', 'List song', 'List Song', 'manage_options', 'list_song', array($this, 'list_song') );
				add_submenu_page( 'top_chart', 'List Album', 'List Album', 'manage_options', 'list_album', array($this, 'list_album') );
			}

	 public function admin_index()
			 		{
			 			require_once plugin_dir_path( __FILE__ ).'template-parts/admin-dashboard/admin_index.php';
			 		}	

	 public function add_song()
					{
						require_once plugin_dir_path( __FILE__ ).'template-parts/admin-dashboard/add_song.php';
					}	

	 public function list_song()
					{
						require_once plugin_dir_path( __FILE__ ).'template-parts/admin-dashboard/list_song.php';
					}	

	 public function list_album()
					{
						require_once plugin_dir_path( __FILE__ ).'template-parts/admin-dashboard/list_album.php';
					}		 								

	 public function activate() {
		$dbcon_link = ABSPATH.'wp-content/plugins/topchart/inc/dbcon.php';
		require_once $dbcon_link;	
	 }

	 public function deactivate() {

	 }

	 function enqueue() {
	 	wp_enqueue_style( 'pluginstyle', plugins_url( 'style.css', __FILE__ ));
	 	wp_enqueue_script( 'pluginscript', plugins_url( 'main.js', __FILE__ ));
	 }
}

if (class_exists('topchart_plugin')) {
	$topchart_plugin = new topchart_plugin();
	$topchart_plugin->register();
}

//activation
register_activation_hook( __FILE__, array($topchart_plugin, 'activate') );

//dactivation
register_deactivation_hook( __FILE__, array($topchart_plugin, 'deactivate') );

function button_shortcode($atts){
	extract(shortcode_atts( array(

			'type' => 'default',
			'label' => 'default',
			'link' => '#',
	), $atts ));

	return "<a href='{$link}' class='btn btn-{$type}'> {$label} </a> ";				
}

add_shortcode( 'btn', 'button_shortcode' );

function topchart_function($atts)
{
	extract(shortcode_atts( array(

				'chart_name' => 'NULL'
			),
			$atts));

		if ($chart_name != 'NULL' ) {
			ob_start();
			include ABSPATH.'wp-content/plugins/topchart/template-parts/front-end/page.php';
			$content = ob_get_clean();
			return $content;
		}
}

add_shortcode( 'topchart', 'topchart_function' );