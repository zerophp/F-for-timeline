<?php
$controller = $data[1];
@$action = $data[2];

$call = array(
    'controller'=>$data[1],
    'action' => $data[2],
    'parameters' => null
);

$i = 3;

while (isset($data[i]))
{
    if (isset($data[i+1]))
    {
        $temppar[$data[i]]=$data[i+1];
    }
    else {
        //error call
    }
}