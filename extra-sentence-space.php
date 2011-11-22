<?php
/**
 * @package Extra_Sentence_Space
 * @author Scott Reilly
 * @version 1.2.4
 */
/*
Plugin Name: Extra Sentence Space
Version: 1.2.4
Plugin URI: http://coffee2code.com/wp-plugins/extra-sentence-space/
Author: Scott Reilly
Author URI: http://coffee2code.com
Description: Force browsers to display two spaces (when present) between sentences.

Compatible with WordPress 1.5+, 2.0+, 2.1+, 2.2+, 2.3+, 2.5+, 2.6+, 2.7+, 2.8+, 2.9+, 3.0+, 3.1+, 3.2+, 3.3+.

=>> Read the accompanying readme.txt file for instructions and documentation.
=>> Also, visit the plugin's homepage for additional information and updates.
=>> Or visit: http://wordpress.org/extend/plugins/extra-sentence-space/

*/

/*
Copyright (c) 2008-2011 by Scott Reilly (aka coffee2code)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy,
modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

if ( ! function_exists( 'c2c_extra_sentence_space' ) ) :
/**
 * Preserves two spaces (when present) between sentences for display as HTML.
 *
 * The spaces are preserved by the first space being converted to a non-breaking space entity, '&nbsp;'.
 *
 * @param string $text The text to have sentence-ending double-spaces preserved for display as HTML.
 * @return string The converted text
 */
function c2c_extra_sentence_space( $text ) {
	$punctuation = preg_quote( apply_filters( 'c2c_extra_sentence_space_punctuation', '.!?' ) );
	return preg_replace( "/([$punctuation][\'\"]?)([ ]{2,})/imsU", "$1&nbsp; ", $text );
}
add_filter( 'c2c_extra_sentence_space', 'c2c_extra_sentence_space' );
endif;

add_filter( 'comment_text', 'c2c_extra_sentence_space', 9 );
add_filter( 'the_title',    'c2c_extra_sentence_space', 9 );
add_filter( 'the_content',  'c2c_extra_sentence_space', 9 );
add_filter( 'the_excerpt',  'c2c_extra_sentence_space', 9 );
add_filter( 'widget_text',  'c2c_extra_sentence_space', 9 );

?>