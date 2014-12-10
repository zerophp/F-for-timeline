<?php
require_once '../autoload.php';

set_include_path(get_include_path().";".__DIR__.'/../modules'.
    ";".__DIR__.'/../vendor');


Core_src_Application_application::setConfig('../config/global.php');
Core_src_Application_application::run();

