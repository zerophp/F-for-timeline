<?php
require_once '../autoload.php';

// set_include_path(get_include_path().";".__DIR__.'/../modules'.
//     ";".__DIR__.'/../vendor');

// use \Core\Application\application as bootstrap;

\Core\Application\application::setConfig('../config/global.php');
\Core\Application\application::run();

