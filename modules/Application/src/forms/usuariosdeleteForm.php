<?php
$usuariosdelete_form = array(
    'name'=>
    array(
        'name'          => 'name',
        'type'          => 'text',
        'defaultValue'  => '',
        'id'            => 'name',
        'label'         => 'Name',
        'placeholder'   => 'Introduce name',
        'validation'    => array('required'),
        'filters'       => array('stripTrim', 'stripTags', 'escape'),
    ),

    'submitno'=>
    array(
        'name'          => 'enviar',
        'type'          => 'submit',
        'defaultValue'  => 'No',
        'validation'    => array( ),
        'filters'       => array(),
    
    ),
    'submitsi'=>
    array(
        'name'          => 'enviar',
        'type'          => 'submit',
        'defaultValue'  => 'Si', 
        'validation'    => array( ),
        'filters'       => array(),
        
    ),

);