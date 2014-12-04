<?php

function write2db($config,$postfilter)
{
    // Conectar a la DBMS
    $link = mysqli_connect($config['database']['host'], 
                   $config['database']['user'],
                   $config['database']['password']
                   );
    // Seleccionar DB
    mysqli_select_db($link, $config['database']['db']);
    
    // INSERT INTO users...
    $sql = "INSERT INTO users SET 
				name = '".$postfilter['name']."',
				email = '".$postfilter['email']."',
                password = '".$postfilter['password']."'
                ";
    
    $data =mysqli_query($link, $sql);
    return $data;
}