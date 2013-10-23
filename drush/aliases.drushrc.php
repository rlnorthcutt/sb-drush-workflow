<?php
$aliases['prod'] = array(
  'uri' => 'www.mysite.com',
  'root' => '/var/www/html',
  'remote-host' => '127.0.0.1',
  'remote-user' => 'admin',
  'path-aliases' => array(
    '%dump-dir' => '/tmp',
    '%files' => 'sites/default/files',
  ),
  // Forces the sql-sync & rsync to simulate if the policy misses them
  'command-specific' => array (
    'sql-sync' => array (
      'simulate' => '1',
    ),
    'rsync' => array (
      'simulate' => '1',
    ),
  ),
);

$aliases['prod-2'] = array(
  'uri' => 'www.mysite.com',
  'root' => '/var/www/html',
  'remote-host' => '127.0.0.2',
  'remote-user' => 'admin',
  'path-aliases' => array(
    '%dump-dir' => '/tmp',
    '%files' => 'sites/default/files',
  ),
  // Forces the sql-sync & rsync to simulate if the policy misses them
  'command-specific' => array (
    'sql-sync' => array (
      'simulate' => '1',
    ),
    'rsync' => array (
      'simulate' => '1',
    ),
  ),
);

$aliases['staging'] = array(
  'uri' => 'staging.mysite.com',
  'root' => '/var/www/staging/public',
  'remote-host' => '127.0.0.3',
  'remote-user' => 'admin',
  'path-aliases' => array(
    '%dump-dir' => '/tmp',
    '%files' => 'sites/default/files',
  ),
);

$aliases['dev'] = array(
  'uri' => 'dev.mysite.com',
  'root' => '/var/www/dev/public',
  'remote-host' => '127.0.0.4',
  'remote-user' => 'admin',
  'path-aliases' => array(
    '%dump-dir' => '/tmp',
    '%files' => 'sites/default/files',
  ),
);
