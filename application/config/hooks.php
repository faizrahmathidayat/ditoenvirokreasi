<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

// $hook['pre_system'][] = array(
//     'class'    => 'Maintenance_hook',
//     'function' => 'offline_check',
//     'filename' => 'Maintenance_hook.php',
//     'filepath' => 'hooks'
// );
# Load phpdotenv
require_once FCPATH.'vendor/autoload.php';
$hook['pre_system'] = function() {
    $dotenv = Dotenv\Dotenv::create(FCPATH);
    $dotenv->load();
};
