<?php


function createUser($postfilter)
{
    $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
    return write2txt($filename,$postfilter);  
}