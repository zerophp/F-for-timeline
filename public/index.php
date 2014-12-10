<?php
require_once '../autoload.php';

set_include_path(get_include_path().";".__DIR__.'/../modules'.
    ";".__DIR__.'/../vendor');


$application = new Core_src_Application_application('../config/global.php');
$application->run();

