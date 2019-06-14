<?php
return [
  'name' => "My Swoole-FastWork Migrations",
  'migrations_namespace' => 'Utils\migrations',
  'table_name' => 'sw_fw_migration_versions',
  'column_name' => 'version',
  'column_length' => 14,
  'executed_at_column_name' => 'executed_at',
  'migrations_directory' => "/home/gabriel/PhpstormProjects/swoole-fw/database/migrations",
  'all_or_nothing' => true,
];