=== Extra Sentence Space ===
Contributors: coffee2code
Donate link: http://coffee2code.com/donate
Tags: formatting, post, content, space, coffee2code
Requires at least: 1.5
Tested up to: 3.2
Stable tag: 1.2.3
Version: 1.2.3

Force browsers to display two spaces (when present) between sentences.


== Description ==

Force browsers to display two spaces (when present) between sentences.

Even though you may add two spaces after each sentence when writing a post (assuming you subscribe to a writing style that suggests such spacing) web browsers will collapse consecutive blank spaces into a single space when viewed.  This plugin adds a &nbsp; (non-breaking space) after sentence-ending punctuation to retain the appearance of your two-space intent.

NOTE: The plugin will only enforce the two-space gap in places where two or more spaces actually separate sentences in your posts.  It will NOT insert a second space if only one space is present.

Links: [Plugin Homepage](http://coffee2code.com/wp-plugins/extra-sentence-space/) | [Author Homepage](http://coffee2code.com)


== Installation ==

1. Unzip `extra-sentence-space.zip` inside the `/wp-content/plugins/` directory (or install via the built-in WordPress plugin installer)
1. Activate the plugin through the 'Plugins' admin menu in WordPress
1. Begin (or continue) to use two spaces to separate your sentences when writing a post.


== Frequently Asked Questions ==

= What text does this plugin modify (aka filter)? =

This plugin potentially modifies the post content, excerpt, title, comment text, and widget text.

= Why do my sentences still appear to be separated by only one space despite the plugin being active? =

Did you use two spaces to separate the sentences when you wrote the post?  This plugin only retains the appearance of those two spaces when the post is viewed in a browser; it does not insert a second space if there wasn't one originally present.

= Can I enforce double-spacing after other types of punctuation? =

Yes.  See the Filters section for an example of the code you'll need to use.


== Filters ==

The plugin is further customizable via two filters. Typically, these customizations would be put into your active theme's functions.php file, or used by another plugin.

= c2c_extra_sentence_space =

The 'c2c_extra_sentence_space' filter allows you to use an alternative approach to safely invoke `c2c_extra_sentence_space()` in such a way that if the plugin were deactivated or deleted, then your calls to the function won't cause errors in your site.  This only applies if you use the function directly, which is not typical usage for most users.

Example:

Instead of:

    `<?php echo c2c_extra_sentence_space( $mytext ); ?>`

Do:

    `<?php echo apply_filters( 'c2c_extra_sentence_space', $mytext ); ?>`

= c2c_extra_sentence_space_punctuation =

The 'c2c_extra_sentence_space_punctuation' filter allows you to customize the punctuation, characters, and/or symbols after which double-spacing (when present) is preserved.  By default these are '.!?'.

Arguments:

* $punctuation (string): The default characters after which double-spacing should be preserved. Default is '.!?'.

Example:

`add_filter( 'c2c_extra_sentence_space_punctuation', 'more_extra_space_punctuation' );
function more_extra_space_punctuation( $punctuation ) {
	// Adding the '/' and ')' characters to the list of characters
	return $punctuation . '/)';
}`


== Changelog ==

= 1.2.3 =
* Note compatibility through WP 3.2+
* Tiny code formatting change (spacing)
* Fix plugin homepage and author links in description in readme.txt

= 1.2.2 =
* Add link to plugin homepage to description in readme.txt

= 1.2.1 =
* Note compatibility with WP 3.1+
* Update copyright date (2011)

= 1.2 =
* Add filter 'c2c_extra_sentence_space_punctuation' to allow customization of the punctuation after which double-spacing (when present) is preserved. Default is '.!?'
* Add filter 'c2c_extra_sentence_space' to respond to the function of the same name so that users can use the apply_filters('c2c_extra_sentence_space') notation for invoking function
* Wrap function in if (function_exists()) check
* Note compatibility with WP 3.0+
* Minor code reformatting (spacing)
* Remove docs from top of plugin file (all that and more are in readme.txt)
* Remove trailing whitespace in header docs
* Add Filters and Upgrade Notice sections to readme.txt

= 1.1 =
* Also filter 'widget_text'
* Now also filter widget_text
* Add PHPDoc documentation
* Note compatibility with WP 2.8+ and 2.9+
* Update readme.txt (including adding Changelog)

= 1.0.1 =
* Note compatibility with WP 2.6+ and 2.7+
* Update copyright date
* Tweak description and extended description
* Remove commented out line of code that could be used to insert a second space if two aren't present
* Update and fix some mis-worded sentences in readme.txt

= 1.0 =
* Initial release


== Upgrade Notice ==

= 1.2.3 =
Trivial update: noted compatibility through WP 3.2+

= 1.2.2 =
Trivial update: add link to plugin homepage to description in readme.txt

= 1.2.1 =
Trivial update: noted compatibility through WP 3.1+ and updated copyright date

= 1.2 =
Minor update. Highlights: added filter to customize punctuation that get subsequent double-spacing preserved; added if(function_exists()) check around c2c_extra_sentence_space(); minor text reorganization; added verified WP 3.0 compatibility.