<?php


echo "<pre>";
print_r($_SESSION);
echo "</pre>";

session_start();

$_SESSION['name']='agustin';


echo "<pre>Con valor:";
print_r($_SESSION);
echo "</pre>";

echo session_id();
echo "<hr>";
session_regenerate_id();

echo session_id();

session_destroy();

session_start();
echo "<hr>";

echo session_id();


echo "<pre>";
print_r($_SESSION);
echo "</pre>";


echo "sessiones";