<?php



if(!isset($action))
    $action = 'select';

switch ($action)
{
    case 'insert':
        $pagetitle = "Insert";
        $page = __DIR__ . '/../views/timeline/insert.php';
        break;
    case 'update':
        $pagetitle = "Update";
        $page = __DIR__ . '/../views/timeline/update.php';
        break;
    case 'select':
        $pagetitle = "Select";
        $page = __DIR__ . '/../views/timeline/select.php';
        break;
    case 'delete':
        $pagetitle = "Delete";
        $page = __DIR__ . '/../views/timeline/delete.php';
        break;
}

include_once (__DIR__ . '/../views/templates/template.php');
