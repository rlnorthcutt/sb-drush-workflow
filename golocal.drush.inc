<?php
/**
 * @file
 * Golocal Drush integration - alter the site for local development.
 */

/**
 * Implements hook_drush_command().
 *
 * @return
 *   An associative array describing your command(s).
 */
function golocal_drush_command() {
  return array(
    'golocal' => array(
      'description' => dt('Puts your site in local development mode.'),
    ),
    'goprod' => array(
      'description' => dt('Puts your site in production mode.'),
    ),
  );
}

/**
 * Put the site in local development mode.
 */
function drush_golocal() {
  // Enable dev friendly modules.
  module_enable(array('devel', 'reroute_email', 'dblog', 'update', 'diff', 'field_ui'), TRUE);

  // Disable any production modules that you don't want to run locally, like
  // CDN.
  $disable = array();
  module_disable($disable);
  drush_log(dt('Modules disabled: @modules', array('@modules' => implode(', ', $disable))), 'ok');

  // Make sure the rerouting of email is turned on so we don't send emails to
  // actual users from our local installations.
  if(module_exists('reroute_email')) {
    variable_set('reroute_email_enable', 1);
    variable_set('reroute_email_address', 'me@here.com');
    drush_log("Email is being rerouted to me@here.com.", 'ok');
  } else {
    drush_log('Emails will be sent to users!', 'warning');
  }

  // Allow everyone to see devel messages like dpm().
  if(module_exists('devel')) {
    user_role_grant_permissions(1, array('access devel information'));
    user_role_grant_permissions(2, array('access devel information'));
  }

  // Set some dev-friendly settings
  variable_set('cache', "0");
  variable_set('block_cache', "0");
  variable_set('error_level', "2");
  variable_set('preprocess_js', "0");
  variable_set('preprocess_css', "0");
  variable_set('page_compression', "0");
  drush_log('Page cache, page compression, JS optimization, and CSS optimization disabled.', 'ok');

  drupal_flush_all_caches();
  drush_log('All caches cleared.', 'ok');

  drush_log('Site ready for development!', 'ok');
}

/**
 * Put the site in production mode.
 */
function drush_goprod() {
  // @TODO: reverse the above
}

  
