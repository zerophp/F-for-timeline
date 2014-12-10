<?php


function update2txt($filename,$postfilter)
{
    $data = implode ("|",$postfilter);
    $data.="\n";
    return file_put_contents($filename, $data, FILE_APPEND);    
}