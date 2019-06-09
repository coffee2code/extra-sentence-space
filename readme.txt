=== Extra Sentence Space ===
Contributors: coffee2code
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ARCFJ9TX3522
Tags: formatting, post, content, space, coffee2code
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 1.5
Tested up to: 5.2
Stable tag: 1.3.8

Force browsers to display two spaces (when present) between sentences.


== Description ==

Even though you may add two spaces after each sentence when writing a post (assuming you subscribe to a writing style that suggests such spacing) web browsers will collapse consecutive blank spaces into a single space when viewed. This plugin adds a `&nbsp;` (non-breaking space) after sentence-ending punctuation to retain the appearance of your two-space intent.

NOTE: The plugin will only enforce the two-space gap in places where two or more spaces actually separate sentences in your posts. It will NOT insert a second space if only one space is present.

Links: [Plugin Homepage](http://coffee2code.com/wp-plugins/extra-sentence-space/) | [Plugin Directory Page](https://wordpress.org/plugins/extra-sentence-space/) | [GitHub](https://github.com/coffee2code/extra-sentence-space/) | [Author Homepage](http://coffee2code.com)


== Installation ==

1. Install via the built-in WordPress plugin installer. Or download and unzip `extra-sentence-space.zip` inside the plugins directory for your site (typically `wp-content/plugins/`)
2. Activate the plugin through the 'Plugins' admin menu in WordPress
3. Begin (or continue) to use two spaces to separate your sentences when writing a post.


== Frequently Asked Questions ==

= What text does this plugin modify (aka filter)? =

This plugin potentially modifies the post content, excerpt, title, comment text, and widget text.

= Why do my sentences still appear to be separated by only one space despite the plugin being active? =

Did you use two spaces to separate the sentences when you wrote the post?  This plugin only retains the appearance of those two spaces when the post is viewed in a browser; it does not insert a second space if there wasn't one originally present.

= Can I enforce double-spacing after other types of punctuation? =

Yes. See the Filters section for an example of the code you'll need to use.

= Does this plugin include unit tests? =

Yes.


== Hooks ==

The plugin is further customizable via two filters. Typically, these customizations would be put into your active theme's functions.php file, or used by another plugin.

**c2c_extra_sentence_space**

The 'c2c_extra_sentence_space' filter allows you to use an alternative approach to safely invoke `c2c_extra_sentence_space()` in such a way that if the plugin were deactivated or deleted, then your calls to the function won't cause errors in your site. This only applies if you use the function directly, which is not typical usage for most users.

Example:

Instead of:

    <?php echo c2c_extra_sentence_space( $mytext ); ?>

Do:

    <?php echo apply_filters( 'c2c_extra_sentence_space', $mytext ); ?>

**c2c_extra_sentence_space_punctuation**

The 'c2c_extra_sentence_space_punctuation' filter allows you to customize the punctuation, characters, and/or symbols after which double-spacing (when present) is preserved. By default these are '.!?'.

Arguments:

* $punctuation (string): The default characters after which double-spacing should be preserved. Default is '.!?'.

Example:

`
/**
 * Modifies the list of characters after which two spaces should be preserved
 * to include a forward slash.
 *
 * @param string $punctuation The punctuation.
 * @return string
 */
function more_extra_space_punctuation( $punctuation ) {
	// Add the '/' and ')' characters to the list of characters
	return $punctuation . '/)';
}
add_filter( 'c2c_extra_sentence_space_punctuation', 'more_extra_space_punctuation' );
`


== Changelog ==

= 1.3.8 (2019-06-08) =
* Change: Update unit test install script and bootstrap to use latest WP unit test repo
* Change: Note compatibility through WP 5.2+
* Change: Add link to CHANGELOG.md in README.md

= 1.3.7 (2019-02-05) =
* New: Add CHANGELOG.md and move all but most recent changelog entries into it
* New: Add inline documentation for hook
* Change: Rename readme.txt section from 'Filters' to 'Hooks'
* Change: Add inline documentation to example in readme.txt
* Change: Split paragraph in README.md's "Support" section into two
* Change: Note compatibility through WP 5.1+
* Change: Update copyright date (2019)
* Change: Update License URI to be HTTPS

= 1.3.6 (2018-04-14) =
* New: Add README.md
* Change: Minor whitespace tweaks to unit test bootstrap
* Change: Add GitHub link to readme
* Change: Modify formatting of hook name in readme to prevent being uppercased when shown in the Plugin Directory
* Change: Note compatibility through WP 4.9+
* Change: Update copyright date (2018)

= Full changelog is available in [CHANGELOG.md](CHANGELOG.md). =


== Upgrade Notice ==

= 1.3.8 =
Trivial update: modernized unit tests, noted compatibility through WP 5.2+

= 1.3.7 =
Trivial update: created CHANGELOG.md to store historical changelog outside of readme.txt, minor documentation changes, noted compatibility through WP 5.1+, and updated copyright date (2019)

= 1.3.6 =
Trivial update: added README.md, noted compatibility through WP 4.9+, and updated copyright date (2018)

= 1.3.5 =
Trivial update: noted compatibility through WP 4.7+, updated unit test bootstrap, minor documentation tweaks, updated copyright date

= 1.3.4 =
Trivial update: minor unit test tweaks, noted compatibility through WP 4.4+, and updated copyright date

= 1.3.3 =
Trivial update: noted compatibility through WP 4.3+

= 1.3.2 =
Trivial update: noted compatibility through WP 4.1+ and updated copyright date

= 1.3.1 =
Trivial update: noted compatibility through WP 4.0+; added plugin icon.

= 1.3 =
Minor update: fixed bug if using '/' as custom-defined punctuation; added unit tests; noted compatibility through WP 3.8+

= 1.2.6 =
Trivial update: noted compatibility through WP 3.5+

= 1.2.5 =
Trivial update: noted compatibility through WP 3.4+; explicitly stated license

= 1.2.4 =
Trivial update: noted compatibility through WP 3.3+

= 1.2.3 =
Trivial update: noted compatibility through WP 3.2+

= 1.2.2 =
Trivial update: add link to plugin homepage to description in readme.txt

= 1.2.1 =
Trivial update: noted compatibility through WP 3.1+ and updated copyright date

= 1.2 =
Minor update. Highlights: added filter to customize punctuation that get subsequent double-spacing preserved; added if(function_exists()) check around c2c_extra_sentence_space(); minor text reorganization; added verified WP 3.0 compatibility.
