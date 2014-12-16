<?php
$usuarios_form = array(
    'id'=>
    array(
        'name'          => 'id',
        'type'          => 'hidden',
        'defaultValue'  => '',
        'id'            => 'id',
        'label'         => '',
        'placeholder'   => 'Introduce name',
        'validation'    => array('required'),
        'filters'       => array('stripTrim', 'stripTags', 'escape'),
    ),
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
    'password'=>
    array(
        'name'          => 'password',
        'type'          => 'text',
        'defaultValue'  => '',
        'id'            => 'password',
        'label'         => 'Password',
        'placeholder'   => 'Introduce password',
        'validation'    => array('required'),
        'filters'       => array('stripTrim', 'stripTags', 'escape'),
    ),
    'id'=>
    array(
        'name'          => 'id',
        'type'          => 'hidden',
        'defaultValue'  => '-1',
        'id'            => 'id',
        'label'         => '',
        'placeholder'   => '',
        'validation'    => array( 'number'),
        'filters'       => array('stripTrim', 'stripTags', 'escape'),
    ),
    'submit'=>
    array(
        'name'          => 'enviar',
        'type'          => 'submit',
        'defaultValue'  => 'Enviar', 
        'validation'    => array( ),
        'filters'       => array(),
        
    ),

);