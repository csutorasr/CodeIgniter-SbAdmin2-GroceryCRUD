<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Auth Constants
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

function auth_constants(){

/*
| -----------------------------------------------------------------
| USE_SSL
| -----------------------------------------------------------------
| Set to 1 for standard SSL certificate.
| Set to 0 for no SSL.
| 
*/

	define('USE_SSL', 0);

/*
| -----------------------------------------------------------------
| LOGIN_PAGE
| -----------------------------------------------------------------
| This is the uri string to the hidden login route. 
| We can change this if there is a brute force attack on the login. 
| You can set this to almost anything except "examples/login", unless 
| you modify the login method in the User controller.
| 
*/

	define('LOGIN_PAGE', 'login');

/*
| -----------------------------------------------------------------
| AUTH_REDIRECT_PARAM
| -----------------------------------------------------------------
| Community Auth uses a query string param for the location
| to redirect back to after successful login. This can be customized,
| in case "redirect" would conflict with your application.
| 
*/

	define('AUTH_REDIRECT_PARAM', 'redirect');

/*
| -----------------------------------------------------------------
| AUTH_LOGOUT_PARAM
| -----------------------------------------------------------------
| Community Auth uses a query string param to indicate that
| user should be shown a message when logged out. This can be customized,
| in case "logout" would conflict with your application.
| 
*/

	define('AUTH_LOGOUT_PARAM', 'logout');

}

/* End of file auth_constants.php */
/* Location: /community_auth/hooks/constants.php */