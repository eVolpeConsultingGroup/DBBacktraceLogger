<?php

$dictionary["ev_backtrace_log"] = array(
    'table' => 'ev_backtrace_log',
    'fields' => array(
        'id' => array(
            'name' => 'id',
            'type' => 'varchar',
            'required' => true,
            'len' => 32,
            'isnull' => 'false',
        ),
        'message' => array(
            'name' => 'message',
            'type' => 'text',
        ),
        'debug' => array(
            'name' => 'debug',
            'type' => 'longtext',
        ),
        'counter' => array(
            'name' => 'counter',
            'type' => 'long',
            'default' => 0,
        ),
    ),
    'indices' => array(
        array(
            'name' => 'ev_month_id_name',
            'type' => 'primary',
            'fields' => array(
                'id',
            ),
        ),
    ),
);
