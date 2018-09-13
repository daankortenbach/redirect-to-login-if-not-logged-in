=== Redirect to login if not logged in ===

Plugin Name: Redirect to login if not logged in
Plugin URI: http://wordpress.org/plugins/redirect-to-login-if-not-logged-in/
Contributors: daankortenbach
Tags: redirect, login
Requires at least: 3.0.1
Tested up to: 5.0
Stable tag: 1.7.0
Version: 1.7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Redirects users to the login page if the visitor is not logged in.

== Description ==

Redirects users to the login page if the user is not logged in. After login the user gets redirected to the original entry page. For advanced users a filter is provided to override the redirect.

The principle behind this plugin is to redirect all users - from every post, page, archive, etc. - to the login page (usually wp-login.php). Except for the override filter it does nothing else.

= Overriding the redirect =

* **Note:** This plugin may not be for you, a membership plugin might be a better fit. Chris Lema writes excellent reviews of +30 membership plugins here: http://chrislema.com/category/memberships-plugins/

If you do have a need for this plugin and you want to exclude specific views under specific conditions, a filter is provided to override the redirect.

To override the redirect the filter must return a boolean value of `true`. WordPress core provides many conditional tags that either return `true` or `false` or you can write your own conditionals.

Take a look at the Conditional Tags page on The WordPress Codex for some inspiration.
https://codex.wordpress.org/Conditional_Tags

**Usage:**
Copy/paste/edit an example to the functions.php of your theme or create a new file in wp-content/mu-plugins/ if you do not wish to edit your theme.

_Note: Be carefull not to use multiple filters at the same time as that may cause unexpected results. Instead use multiple conditions in one filter._

* Override if the front page is either posts or a page:

  `add_filter( 'rtl_override_redirect', 'is_front_page' );`

* Override if the post is 'hello-world':

  `add_filter( 'rtl_override_redirect', function() {  
  	return is_single( 'hello-world' );  
  });`

* Override if the page is 'sample-page':

  `add_filter( 'rtl_override_redirect', function() {  
  	return is_page( 'sample-page' );  
  });`

* Override if the page ID is 42, the slug is 'sample-page' or the title is 'About Me':

  `add_filter( 'rtl_override_redirect', function() {  
  	return is_page( array( 42, 'sample-page', 'About Me' ) );  
  });`

* Override if the page ID is 42 or a post is 'hello-world':

  `add_filter( 'rtl_override_redirect', function() {  
  	if ( is_page( 42 ) || is_single( 'hello-world' ) ) {  
  		return true;  
  	}  
  });`

== Installation ==

1. Upload `redirect-to-login-if-not-logged-in` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 1.7.0 =
* Add redirect override filter.
* Add filter examples.

= 1.6.3 =
* Fix svn repo.

= 1.6.2 =
* Version file mismatch fix.

= 1.6.1 =
* WordPress 4.2 compatibility update.

= 1.6 =
* WordPress 4.1.1 compatibility update.

= 1.5 =
* Complete rewrite to use the already existing auth_redirect hook.
* Strips '?loggedout=true' from redirect url after login.

= 1.4 =
* Moved the conditionals to the init hook due to some edge cases not redirecting.

= 1.3 =
* Plugin naming.

= 1.2 =
* Releasing to the WordPress plugin repo.

= 1.1 =
* Cleanup.
* Now using wp_login_url() in redirect.

= 1.0 =
* Initial version.
