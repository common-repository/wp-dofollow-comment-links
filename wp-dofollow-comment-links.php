<?php
/*
Plugin Name:  WP DoFollow Comment Links
Plugin URI:   https://wordpress.org/plugins/wp-dofollow-comment-links/
Description:  The plugin automatically makes all the comment links to your own domain dofollow, while all external links remain nofollow.
Version:      1.0.0
Author:       Sematigo
Author URI:   https://sematigo.co.uk
Text Domain:  wpdfcl
License:      GPL2

WP DoFollow Comment Links is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
WP DoFollow Comment Links is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with WP DoFollow Comment Links. If not, see https://www.gnu.org/licenses/gpl-2.0.html .
*/

if (!function_exists('wpdfcl_remove_rel_nofollow_attribute')) {

	function wpdfcl_remove_rel_nofollow_attribute($comment_text) {
		
		$host = parse_url(home_url(), PHP_URL_HOST);

		if (strpos($comment_text, $host)) {
			$comment_text = str_ireplace(' rel="nofollow"', '', $comment_text );
		}
		
		return $comment_text;
	}

	add_filter('comment_text', 'wpdfcl_remove_rel_nofollow_attribute');

}
