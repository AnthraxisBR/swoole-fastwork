<?php

$metadata->mapField(array(
    'id' => true,
    'fieldName' => 'id',
    'type' => 'integer'
));

$metadata->mapField(array(
    'fieldName' => 'username',
    'type' => 'string',
    'options' => array(
        'fixed' => true,
        'comment' => "User's login name"
    )
));

$metadata->mapField(array(
    'fieldName' => 'login_count',
    'type' => 'integer',
    'nullable' => false,
    'options' => array(
        'unsigned' => true,
        'default' => 0
    )
));