<?php
/**
 * @package Redirect to login if not logged in
 * @version 1.7.0
 */
/*
Plugin Name:   Redirect to login if not logged in
Plugin URI:    http://wordpress.org/plugins/redirect-to-login-if-not-logged-in/
Description:   Redirects a user to the login page if the user is not logged in. After login the user gets redirected to the original entry page. Supports a filter to conditionally override pages.
Author:        Daan Kortenbach
Version:       1.7.0
Author URI:    https://wppro.nl/
License:       GPL-2.0 or later
License URI:   http://www.gnu.org/licenses/gpl-2.0.txt
*/


namespace redirect_to_login_if_not_logged_in;

redirect::init();
/**
 * Redirects a user to the login page if the user is not logged in.
 * After login the user gets redirected to the original entry page.
 * Provides a filter 'rtl_override_redirect' to override the redirect.
 *
 * @package Redirect to login if not logged in
 * @since 1.7.0
 */
class redirect {

	/**
	 * Init - Hook redirect to template_redirect if filter is used, else to parse_request to prevent unnecessary load.
	 *
	 * @since 1.7.0
	 */
	public static function init() {

		if ( has_filter( 'rtl_override_redirect' ) ){
			$hook = 'template_redirect';
		}
		else {
			$hook = 'parse_request';
		}
		add_action( $hook, array( __CLASS__, 'redirect' ), 1 );
	}

	/**
	 * If the rtl_override_redirect filter is not true the user is logged in or authentication redirect is invoked.
	 *
	 * @since 1.5
	 */
	public static function redirect() {

		/**
		 * Filter to override the redirect.
		 *
		 * @since 1.7.0
		 *
		 * @var boolean $override Set to true to override redirect.
		 */
		$override = apply_filters( 'rtl_override_redirect', $override = false );

		if ( true !== $override ) {
			is_user_logged_in() || auth_redirect();
		}
	}
}
