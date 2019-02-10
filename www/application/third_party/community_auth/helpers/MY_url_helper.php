<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - MY_url_helper
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

/**
 * Create an anchor to the login page.
 *
 * @param  string  URI string to redirect to after successful login.
 * @param  string  Text of login link.
 * @param  string  Any attributes for the login anchor.
 *
 * @return  string  the login anchor
 */
if( ! function_exists('login_anchor') )
{
	function login_anchor( $login_redirect = '', $login_title = 'Login', $login_attributes = '' )
	{
		$link_protocol = USE_SSL ? 'https' : NULL;

		if( $login_redirect )
			$login_redirect = '?' . AUTH_REDIRECT_PARAM . '=' . urlencode( $login_redirect );

		return anchor( site_url( LOGIN_PAGE . $login_redirect, $link_protocol ), $login_title, $login_attributes );
	}
}

// ------------------------------------------------------------------------

/**
 * Create an anchor to log a user out.
 *
 * @param  string  URI to log a user out. (required)
 * @param  string  Text of logout link.
 * @param  string  Any attributes for the logout anchor.
 *
 * @return  string  the logout anchor
 */
if( ! function_exists('logout_anchor') )
{
	function logout_anchor( $logout_uri, $logout_title = 'Logout', $logout_attributes = '' )
	{
		$link_protocol = USE_SSL ? 'https' : NULL;

		return anchor( site_url( $logout_uri, $link_protocol ), $logout_title, $logout_attributes );
	}
}

// ------------------------------------------------------------------------