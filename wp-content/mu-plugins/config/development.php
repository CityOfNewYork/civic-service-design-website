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

require_once ABSPATH . 'wp-admin/includes/plugin.php';

/**
 * Disable Limit Login Attempts plugin
 * @author NYC Opportunity
 */

deactivate_plugins([
  'limit-login-attempts-reloaded/limit-login-attempts-reloaded.php'
]);

/**
 * Reset Defender 2fa settings
 * @author NYC Opportunity
 */

update_option('wd_2auth_settings', '');

/**
 * Enable the Redis Caching Plugin if we have WP_REDIS_HOST defined in
 * the wp-config.php. Caching will optimize the speed of the site, especially
 * transient caches.
 * @author NYC Opportunity
 */

if (null !== WP_REDIS_HOST) {
  activate_plugin('redis-cache/redis-cache.php');
}

/**
 * Enable Query Monitor for advanced Wordpress Query debug and other tooling.
 * @author NYC Opportunity
 */

activate_plugin('query-monitor/query-monitor.php');

/**
 * Activate WP Auto Login for seamless local login
 * @author NYC Opportunity
 */

activate_plugin('wp-auto-login/wp-auto-login.php');

/**
 * Allow local development requests
 * @author NYC Opportunity
 */

header('Access-Control-Allow-Origin: *');

add_filter('allowed_http_origins', function($origins) {
  $origins[] = 'http://localhost:7000'; // Patterns

  return $origins;
});
