<?php

/**
 * Development environment config
 */

/**
 * Whoops PHP Error Handler
 * @link https://github.com/filp/whoops
 * @author NYC Opportunity
 */

if (class_exists('Whoops\Run')) {
  $whoops = new Whoops\Run;
  $whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
  $whoops->register();
}

/**
 * Shorthand for debug logging
 * @author NYC Opportunity
 *
 * @param   String   $str     The string to log.
 * @param   Boolean  $return  Wether to make it human readable.
 */
function debug($str, $return = true) {
  $backtrace = debug_backtrace()[0];

  error_log(
    var_export($str, $return) . " " .
    $backtrace['file'] . ':' . $backtrace['line']
  );
}

/**
 * Include the plugins module
 * @author NYC Opportunity
 */

// require_once ABSPATH . 'wp-admin/includes/plugin.php';

/**
 * Disable plugins required for security but slow down logging into the
 * site for development purposes.
 * @author NYC Opportunity
 */

// deactivate_plugins([
//   'google-authenticator/google-authenticator.php',
//   'limit-login-attempts-reloaded/limit-login-attempts-reloaded.php'
// ]);

/**
 * Allow local development requests
 * @author NYC Opportunity
 */

header('Access-Control-Allow-Origin: *');

add_filter('allowed_http_origins', function($origins) {
  $origins[] = 'http://localhost:7000'; // Patterns
  return $origins;
});
