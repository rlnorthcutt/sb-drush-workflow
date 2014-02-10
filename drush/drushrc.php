<?php
/**
 * @file drushrc.php
 * See http://drush.ws/examples/example.drushrc.php for more info
 */

 /**
 * Check whether Drush is 6.x or better.
 */
if (preg_match('/^[0-5]\./', DRUSH_VERSION)) {
  drush_set_error("This drushrc.php not compatible with Drush versions less than 6.x. Please upgrade.");
}

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
$options['shell-aliases']['get-db'] = 'sql-dump --structure-tables-key=common+springboard --skip-tables-key=common';
$options['shell-aliases']['sync-db-clean'] = 'sql-sync --structure-tables-key=common+springboard --skip-tables-key=common';

/**
 * Structure tables - DB tables that need to have their structure migrated, but
 * NOT their data. We break this up into common and springboard for convenience,
 * and then call both for our shortcuts.
 */
// Common tables
$options['structure-tables']['common'] = array(
  // Advagg tables
  'advagg_bundles',
  // Cache tables
  'cache*',
  // Other core tables
  'history',
  'sessions',
  'watchdog',
  // Devel query log
  'devel*',
  // Search tables
  'search*',
);

// Springboard 4 and Commerce
$options['structure-tables']['springboard'] = array(
  'cache_salesforce_object',
  'fundraiser_sustainers',
  'fundraiser_donation',
  'salesforce_log_batch',
  'salesforce_log_item',
  'salesforce_queue',
  'commerce_line_item',
  'commerce_order',
  'commerce_order_revision',
  'commerce_payment_transaction',
  'commerce_payment_transaction_revision',
  'commerce_paypal_ipn',
  'commerce_product',
  'commerce_product_revision',
  'commerce_cardonfile',
  'webform_submissions',
  'webform_submitted_data',
  'salesforce_sync_map',
  'field_data_commerce_cardonfile_profile',
  'field_data_commerce_customer_address',
  'field_data_commerce_customer_billing',
  'field_data_commerce_display_path',
  'field_data_commerce_line_items',
  'field_data_commerce_order_total',
  'field_data_commerce_product',
  'field_data_commerce_total',
  'field_data_commerce_unit_price',
  'field_data_sbp_address',
  'field_data_sbp_address_line_2',
  'field_data_sbp_cid',
  'field_data_sbp_city',
  'field_data_sbp_country',
  'field_data_sbp_first_name',
  'field_data_sbp_initial_referrer',
  'field_data_sbp_last_name',
  'field_data_sbp_ms',
  'field_data_sbp_referrer',
  'field_data_sbp_salesforce_account_id',
  'field_data_sbp_salesforce_contact_id',
  'field_data_sbp_search_engine',
  'field_data_sbp_search_string',
  'field_data_sbp_state',
  'field_data_sbp_user_agent',
  'field_data_sbp_zip',
  'field_revision_commerce_cardonfile_profile',
  'field_revision_commerce_customer_address',
  'field_revision_commerce_customer_billing',
  'field_revision_commerce_display_path',
  'field_revision_commerce_line_items',
  'field_revision_commerce_order_total',
  'field_revision_commerce_product',
  'field_revision_commerce_total',
  'field_revision_commerce_unit_price',
  'field_revision_sbp_address',
  'field_revision_sbp_address_line_2',
  'field_revision_sbp_cid',
  'field_revision_sbp_city',
  'field_revision_sbp_country',
  'field_revision_sbp_first_name',
  'field_revision_sbp_initial_referrer',
  'field_revision_sbp_last_name',
  'field_revision_sbp_ms',
  'field_revision_sbp_referrer',
  'field_revision_sbp_salesforce_account_id',
  'field_revision_sbp_salesforce_contact_id',
  'field_revision_sbp_search_engine',
  'field_revision_sbp_search_string',
  'field_revision_sbp_state',
  'field_revision_sbp_user_agent',
  'field_revision_sbp_zip',
);

// Combined
$options['structure-tables']['common+springboard'] = array_merge(
  $options['structure-tables']['common'],
  $options['structure-tables']['springboard']
);

/**
 * Skip tables array - these are tables which need to be skipped entirely. This
 * is especially useful for mysql views
 */
$options['skip-tables']['common'] = array();
