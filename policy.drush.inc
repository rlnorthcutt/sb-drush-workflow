<?php
  // policy.drush.inc
  /**
   * Implementation of drush_hook_COMMAND_validate().
   */
   function drush_policy_sql_sync_validate($source = NULL, $destination = NULL) {
     if($destination == '@prod') {
      return drush_set_error(dt('Per policy.drush.inc, you almost overwrote the production database!'));
     }
   }