<?php
/**
 * @package TalkBar.eu
 * @version 1.0
 */
/*
Plugin Name: TalkBar.eu
Plugin URI: http://www.maxence-blog.fr/2011/05/19/plugin-wordpress-talkbar-eu
Description: <strong>TalkBar.eu</strong> est la solution simple, rapide, gratuite et sans publicit&eacute; &agrave; int&eacute;grer dans votre blog pour permettre &agrave; vos visiteurs et/ou utilisateurs de communiquer en ligne. Pour int&eacute;grer la Talkbar dans votre site web, il vous suffit de configurer le plugin pour choisir ou non un pseudonyme par d&eacute;faut. Apr&egrave;s activation du plugin, votre nom de domaine sera automatiquement d&eacute;tect&eacute; et votre Talkbar imm&eacute;diatement op&eacute;rationnelle.
Author: Maxence Rose
Version: 1.0
Author URI: http://www.maxence-blog.fr/
*/

function talkbar_wp_footer()
{
	if(get_option('talkbar_mode') == 'libre')
	{
		echo "<script type=\"text/javascript\" src=\"http://www.talkbar.eu/js/fr_FR/talkbar.js\"></script>\n";
	}
	elseif(get_option('talkbar_mode') == 'perso')
	{
		echo "<script type=\"text/javascript\" src=\"http://www.talkbar.eu/js/fr_FR/talkbar.js\"></script>\n";
		$pseudonyme_talkbar = get_option('talkbar_mode_pseudo');
		$pseudonyme_talkbar = str_replace('#', rand(100, 999), $pseudonyme_talkbar);
		echo "<script type=\"text/javascript\"> autoLogin('" . $pseudonyme_talkbar . "'); </script>\n";
	}
}

function talkbar_options()
{
	add_options_page('TalkBar.eu', 'TalkBar.eu', 'manage_options', basename(__FILE__), 'talkbar_admin_page');
}

function talkbar_admin_page()
{
	include('talkbar_pages.php');
}

function talkbar_activate()
{
	add_option('talkbar_mode_pseudo', 'guest-#');
	add_option('talkbar_mode', 'libre');
	add_option('talkbar_activation', 'oui');
}

function talkbar_init()
{
	if(function_exists('register_setting'))
	{
		register_setting('talkbar-options', 'talkbar_mode_pseudo');
		register_setting('talkbar-options', 'talkbar_mode');
		register_setting('talkbar-options', 'talkbar_activation');
	}
}

if(is_admin())
{
    add_action('admin_menu', 'talkbar_options');
    add_action('admin_init', 'talkbar_init');
}

if(get_option('talkbar_activation') == 'oui')
{
	add_action('wp_footer', 'talkbar_wp_footer');
}

register_activation_hook(__FILE__, 'talkbar_activate');

function talkbar_plugin_action_links($links, $file)
{

	static $this_plugin;

	if(!$this_plugin)
	{
		$this_plugin = plugin_basename(__FILE__);
	}

	if($file == $this_plugin)
	{
		$settings_link = '<a href="options-general.php?page=talkbar.php">' . __("Settings") . '</a>';
		array_unshift($links, $settings_link);
	}

	return $links;

}

function talkbar_plugin_row_meta($links, $file)
{

	static $this_plugin;

	if(!$this_plugin)
	{
		$this_plugin = plugin_basename(__FILE__);
	}

	if($file == $this_plugin)
	{
		$settings_link = '<a href="http://www.talkbar.eu/fr/?talkbar_plugin_wordpress" target="_blank">TalkBar.eu</a>';
		array_unshift($links, $settings_link);
	}

	return $links;

}

add_filter('plugin_action_links', 'talkbar_plugin_action_links', 10, 2);
add_filter('plugin_row_meta', 'talkbar_plugin_row_meta', 10, 2);

?>
