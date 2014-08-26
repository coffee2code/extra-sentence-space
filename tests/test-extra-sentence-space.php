<?php

class Extra_Sentence_Space_Test extends WP_UnitTestCase {

	function tearDown() {
		parent::tearDown();
		// Ensure the filter gets removed
		remove_filter( 'c2c_extra_sentence_space_punctuation', array( $this, 'more_extra_space_punctuation' ) );
	}

	/**
	 * DATA PROVIDERS
	 */

	static function two_spaces_after_handled_punctuation() {
		return array(
			array( 'This is a sentence.  Another sentence.' ),
			array( 'This is a sentence.  Another sentence.  And yet another' ),
			array( 'This is a sentence?  Another sentence.' ),
			array( 'This is a sentence!  Another sentence.' ),
		);
	}

	static function two_spaces_after_unhandled_punctuation() {
		return array(
			array( '(This is a sentence)  Another sentence.' ),
			array( '/This is a sentence/  Another sentence.' ),
			array( '#This is a sentence#  Another sentence.' ),
			array( 'This is a sentence#  (Another sentence.)  And yet another.' ),
		);
	}

	static function single_space_after_handled_punctuation() {
		return array(
			array( 'This is a sentence. Another sentence.' ),
			array( 'This is a sentence? Another sentence.' ),
			array( 'This is a sentence! Another sentence.' ),
		);
	}

	static function single_space_after_unhandled_punctuation() {
		return array(
			array( '(This is a sentence) Another sentence.' ),
			array( '/This is a sentence/ Another sentence.' ),
			array( '#This is a sentence# Another sentence.' ),
		);
	}

	static function two_spaces_after_custom_handled_punctuation() {
		return array(
			array( '(This is a sentence)  Another sentence.' ),
			array( '/This is a sentence/  Another sentence.' ),
			array( 'This is a sentence@  Another sentence.' ),
		);
	}

	static function single_space_after_custom_handled_punctuation() {
		return array(
			array( '(This is a sentence) Another sentence.' ),
			array( '/This is a sentence/ Another sentence.' ),
			array( 'This is a sentence@ Another sentence.' ),
		);
	}

	static function default_filters() {
		return array(
			array( 'comment_text' ),
			array( 'the_title' ),
			array( 'the_content' ),
			array( 'the_excerpt' ),
			array( 'widget_text' ),
		);
	}

	/**
	 * FUNCTIONS FOR HOOKING ACTIONS/FILTERS
	 */


	function more_extra_space_punctuation( $punctuation ) {
		// Add the '/' and ')' characters to the list of characters
		return $punctuation . '/)@';
	}

	function preserve_extra_sentence_space( $text ) {
		return str_replace( '  ', '&nbsp; ', $text );
	}


	/**
	 * TESTS
	 */


	/**
	 * @dataProvider two_spaces_after_handled_punctuation
	 */
	function test_preserves_double_spaces_after_handled_punctuation( $text ) {
		$this->assertEquals( $this->preserve_extra_sentence_space( $text ), c2c_extra_sentence_space( $text ) );
	}

	/**
	 * @dataProvider single_space_after_handled_punctuation
	 */
	function test_ignores_single_space_after_handled_punctuation( $text ) {
		$this->assertEquals( $text, c2c_extra_sentence_space( $text ) );
	}

	/**
	 * @dataProvider two_spaces_after_unhandled_punctuation
	 */
	function test_ignores_double_space_after_unhandled_punctuation( $text ) {
		$this->assertEquals( $text, c2c_extra_sentence_space( $text ) );
	}

	/**
	 * @dataProvider single_space_after_unhandled_punctuation
	 */
	function test_ignores_single_space_after_unhandled_punctuation( $text ) {
		$this->assertEquals( $text, c2c_extra_sentence_space( $text ) );
	}

	/**
	 * @dataProvider two_spaces_after_custom_handled_punctuation
	 */
	function test_preserves_double_space_after_custom_handled_punctuation( $text ) {
		add_filter( 'c2c_extra_sentence_space_punctuation', array( $this, 'more_extra_space_punctuation' ) );
		$this->assertEquals( $this->preserve_extra_sentence_space( $text ), c2c_extra_sentence_space( $text ) );
	}

	/**
	 * @dataProvider single_space_after_custom_handled_punctuation
	 */
	function test_ignores_single_space_after_custom_handled_punctuation( $text ) {
		add_filter( 'c2c_extra_sentence_space_punctuation', array( $this, 'more_extra_space_punctuation' ) );
		$this->assertEquals( $this->preserve_extra_sentence_space( $text ), c2c_extra_sentence_space( $text ) );
	}

	/**
	 * @dataProvider two_spaces_after_handled_punctuation
	 */
	function test_filter_invocation( $text ) {
		$this->assertEquals( $this->preserve_extra_sentence_space( $text ), apply_filters( 'c2c_extra_sentence_space', $text ) );
	}

	/**
	 * Test that the c2c_extra_sentence_space() is applied to the filter
	 * 'the_title' as an example of it applying to handled core filters.
	 *
	 * @dataProvider two_spaces_after_handled_punctuation
	 */
	function test_applies_to_post_title( $text ) {
		$post_id = $this->factory->post->create( array( 'post_title' => $text ) );
		$this->go_to( get_permalink( $post_id ) );
		ob_start();
		the_title();
		$title = ob_get_contents();
		ob_end_clean();
		$this->assertEquals( $this->preserve_extra_sentence_space( $text ), $title );
	}

	/**
	 * @dataProvider default_filters
	 */
	function test_applies_to_all_default_filters( $filter ) {
		$default_hook_priority = 9;
		$this->assertEquals( $default_hook_priority, has_filter( $filter, 'c2c_extra_sentence_space' ) );
	}

}
