<?php
/**
 * Plugin Name: Extra Sentence Space
 * Version:     1.3.6
 * Plugin URI:  http://coffee2code.com/wp-plugins/extra-sentence-space/
 * Author:      Scott Reilly
 * Author URI:  http://coffee2code.com/
 * Text Domain: extra-sentence-space
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Description: Force browsers to display two spaces (when present) between sentences.
 *
 * Compatible with WordPress 1.5 through 4.9+.
 *
 * =>> Read the accompanying readme.txt file for instructions and documentation.
 * =>> Also, visit the plugin's homepage for additional information and updates.
 * =>> Or visit: https://wordpress.org/plugins/extra-sentence-space/
 *
* @package Extra_Sentence_Space
* @author  Scott Reilly
* @version 1.3.6
*/

/*
	Copyright (c) 2008-2018 by Scott Reilly (aka coffee2code)

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined( 'ABSPATH' ) or die();

if ( ! function_exists( 'c2c_extra_sentence_space' ) ) :
	/**
	 * Preserves two spaces (when present) between sentences for display as HTML.
	 *
	 * The spaces are preserved by the first space being converted to a
	 * non-breaking space entity, '&nbsp;'.
	 *
	 * @param string  $text The text to have sentence-ending double-spaces
	 *                      preserved for display as HTML.
	 * @return string       The converted text.
	 */
	function c2c_extra_sentence_space( $text ) {
		$punctuation = preg_quote( apply_filters( 'c2c_extra_sentence_space_punctuation', '.!?' ), '/' );

		return preg_replace( "/([$punctuation][\'\"]?)([ ]{2,})/imsU", "$1&nbsp; ", $text );
	}
	add_filter( 'c2c_extra_sentence_space', 'c2c_extra_sentence_space' );
endif;

add_filter( 'comment_text', 'c2c_extra_sentence_space', 9 );
add_filter( 'the_title',    'c2c_extra_sentence_space', 9 );
add_filter( 'the_content',  'c2c_extra_sentence_space', 9 );
add_filter( 'the_excerpt',  'c2c_extra_sentence_space', 9 );
add_filter( 'widget_text',  'c2c_extra_sentence_space', 9 );
