<?php
$usuariosdelete_form = array(
    'name'=>
    array(
        'name'          => 'name',
        'type'          => 'text',
        'defaultValue'  => '',
        'id'            => 'name',
        'label'         => '¿Realmente quiere borrar el usuario con este Nombre?',
        'placeholder'   => 'Introduce name',
        'validation'    => array('required'),
        'filters'       => array('stripTrim', 'stripTags', 'escape'),
    ),
    'email'=>
    array(
        'name'          => 'email',
        'type'          => 'text',
        'defaultValue'  => '',
        'id'            => 'email',
        'label'         => 'Email',
        'placeholder'   => 'Introduce email',
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