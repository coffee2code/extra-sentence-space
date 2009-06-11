<?php
/*
Plugin Name: Extra Sentence Space
Version: 1.0.1
Plugin URI: http://coffee2code.com/wp-plugins/extra-sentence-space
Author: Scott Reilly
Author URI: http://coffee2code.com
Description: Force browsers to display two spaces (when present) between sentences.

Even though you may add two spaces after each sentence when writing a post (assuming you subscribe to a writing style 
that suggests such spacing) web browsers will collapse consecutive blank spaces into a single space when viewed.
This plugin adds a &nbsp; (non-breaking space) after sentence-ending punctuation to retain the appearance of your
two-space intent.

NOTE: The plugin will only enforce the two-space gap in places where two or more spaces actually separate sentences
in your posts.  It will NOT insert a second space if only one space is present.

Compatible with WordPress 1.5+, 2.0+, 2.1+, 2.2+, 2.3+, 2.5+, 2.6+, 2.7+, 2.8+.

=>> Read the accompanying readme.txt file for more information.  Also, visit the plugin's homepage
=>> for more information and the latest updates

Installation:

1. Download the file http://coffee2code.com/wp-plugins/extra-sentence-space.zip and unzip it into your 
/wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' admin menu in WordPress
3. Begin (or continue) to use two spaces to separate your sentences when writing a post.

*/

/*
Copyright (c) 2008-2009 by Scott Reilly (aka coffee2code)

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

function c2c_extra_sentence_space($text) {
	return preg_replace("/([\.\!\?][\'\"]?)([ ]{2,})/imsU", "$1&nbsp; ", $text);
} // end c2c_extra_sentence_space()

add_filter('comment_text', 'c2c_extra_sentence_space', 9);
add_filter('the_title', 'c2c_extra_sentence_space', 9);
add_filter('the_content', 'c2c_extra_sentence_space', 9);
add_filter('the_excerpt', 'c2c_extra_sentence_space', 9);

?>