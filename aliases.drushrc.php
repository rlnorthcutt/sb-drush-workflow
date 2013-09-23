<?php
/**
 * Add the server aliases to this repo. You will at least want to add your local
 * ssh key to the servers, but you can add ssh keys for each server to the others.
 * That will allow for some cool stuff like db syncing.
 */

$aliases['prod'] = array(
  // needs to match server name as configured in vhost
  'uri' => 'domain.org',
   // Drupal's root directory for that site (not the sites/* folder)
  'root' => '/var/www/html',
   // FQDN or IP of server hosting site (think ssh user@remote-host)
  'remote-host' => 'serverid.host.com',
   // A user on the remote host for which you have an ssh key set up
  'remote-user' => 'admin',
  // Path aliases for common rsync targets. Relative aliases are always taken from the Drupal root.
  'path-aliases' => array(
    '%dump-dir' => '/var/www/private',
    '%files' => 'sites/default/files',
#    '%custom' => '/my/custom/path',
  ),
  
);

$aliases['dev'] = array(
  'uri' => 'stage.domain.org',
  'root' => '/var/www/stage/public',
  'remote-host' => 'serverid.host.com',
  'remote-user' => 'admin',
  'path-aliases' => array(
    '%dump-dir' => '/var/www/stage/private',
    '%files' => 'sites/default/files',
  ),
);

$aliases['dev'] = array(
  'uri' => 'domain.jacksonriverdev.com',
  'root' => '/var/www/domain.jacksonriverdev.com/public',
  'remote-host' => 'domain.jacksonriverdev.com',
  'remote-user' => 'admin',
  'path-aliases' => array(
    '%dump-dir' => '/var/www/domain.jacksonriverdev.com/private',
    '%files' => 'sites/default/files',
  ),
);