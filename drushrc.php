<?php
/**
 * @file drushrc.php
 * See http://drush.ws/examples/example.drushrc.php for more info
 */

/**
 * Useful shell aliases:
 *
 * Drush shell aliases act similar to git aliases.  For best results, define
 * aliases in one of the drushrc file locations between #3 through #6 above.
 * More information on shell aliases can be found via:
 * `drush topic docs-shell-aliases` on the command line.
 *
 * @see https://git.wiki.kernel.org/articles/a/l/i/Aliases.html#Advanced.
 */
#$options['shell-aliases']['pull'] = '!git pull'; // We've all done it.
#$options['shell-aliases']['pulldb'] = '!git pull && drush updatedb';
$options['shell-aliases']['hist'] = '!git log --pretty=format:"%h %ad | %s%d [%an]" --graph --date=short';
$options['shell-aliases']['nc'] = 'pm-list --no-core';
$options['shell-aliases']['nc-on'] = '!drush pml --no-core --type=module --status=enabled --pipe';
$options['shell-aliases']['nc-dis'] = '!drush -y dis $(drush pml --status=enabled --type=module --no-core --pipe)';
$options['shell-aliases']['wipe'] = 'cache-clear all';
$options['shell-aliases']['offline'] = 'variable-set -y --always-set maintenance_mode 1';
$options['shell-aliases']['online'] = 'variable-delete -y --exact maintenance_mode';
$options['shell-aliases']['get-db'] = 'sql-dump --structure-tables-key=common+springboard';
$options['shell-aliases']['sync-db'] = 'sql-sync --structure-tables-key=common+springboard';

/**
 * Structure tables array for clearing database tables when exporting
 */
$options['structure-tables']['common'] = array(
  // Cache tables
  'cache',
  'cache_admin_menu',
  'cache_block',
  'cache_bootstrap',
  'cache_field',
  'cache_filter',
  'cache_form',
  'cache_image',
  'cache_libraries',
  'cache_media_xml',
  'cache_menu',
  'cache_metatag',
  'cache_page',
  'cache_path',
  'cache_rules',
  'cache_token',
  'cache_views',
  'cache_views_data',
  'ctools_css_cache',
  'ctools_object_cache',

  // Other core tables
  'history',
  'sessions',
  'watchdog',

  // Devel query log
  // 'devel_queries',
  // 'devel_times',

  // User profile fields

   // Search tables
  'search_dataset',
  'search_index',
  'search_node_links',
  'search_total',
);

$options['structure-tables']['springboard'] = array(
  // Springboard
  'cache_salesforce_object',
  'fundraiser_sustainers',
  'fundraiser_donation',
  'salesforce_log_batch',
  'salesforce_log_item',
  'salesforce_queue',
  'salesforce_sync_map',

  // Commerce
  'commerce_line_item',
  'commerce_order',
  'commerce_order_revision',
  'commerce_payment_transaction',
  'commerce_payment_transaction_revision',
  'commerce_paypal_ipn',
  'commerce_product',
  'commerce_product_revision',

  // Webform
  'webform_submissions',
  'webform_submitted_data',
);

$options['structure-tables']['common+springboard'] = array_merge(
  $options['structure-tables']['common'],
  $options['structure-tables']['springboard']
);