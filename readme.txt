=== Extra Sentence Space ===
Contributors: coffee2code
Donate link: http://coffee2code.com/donate
Tags: formatting, post, content, space
Requires at least: 1.5
Tested up to: 2.5
Stable tag: trunk
Version: 1.0

Force browsers to display two spaces between sentences.

== Description ==

Force browsers to display two spaces between sentences.

Even though you may add two spaces after each sentence when writing a post (assuming you subscribe to a writing style that suggests such spacing) web browsers will collapse consecutive blank spaces into a single space when viewed.  This plugin adds a &nbsp; (non-breaking space) after sentence-ending punctuation to retain the appearance of your
two-space intent.

NOTE: The plugin will only enforce the two-space gap in places where two or more spaces actually separate sentences in your posts.

== Installation ==

1. Unzip `extra-sentence-space.zip` inside the `/wp-content/plugins/` directory, or upload `extra-sentence-space.php` to `/wp-content/plugins/`
1. Activate the plugin through the 'Plugins' admin menu in WordPress
1. Begin (or continue) to use two spaces to separate your sentences when writing a post.

== Frequently Asked Questions ==

= What text does this plugin modify (aka filter)? =

This plugin potentially modifies the post content, excerpt, title, and comment text.

= Why are my sentences still appear to be separated by only one space despite the plugin being active? =

Did you use two spaces to separate the sentences when you wrote the post?  This plugin only retains the appearance of those two spaces when the post is viewed in a browser; it does not insert a second space if there wasn't originally present.
