<?php

onBootstrap($config);

function onBootstrap($config)
{
    connect2DB($config);
//     sessionInit();
    
}

function connect2DB($config)
{
    // Conectar a la DBMS
    $link = mysqli_connect($config['database']['host'],
        $config['database']['user'],
        $config['database']['password']
    );
    // Seleccionar DB
    mysqli_select_db($link, $config['database']['db']);
    
    return $link;
}