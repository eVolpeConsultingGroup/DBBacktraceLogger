<?php
$manifest = array(
    'built_in_version' => '7.7.0.0',
    'acceptable_sugar_flavors' => array(
        'ENT',
        'ULT',
        'PRO',
        'CE',
    ),
    'acceptable_sugar_versions' => array(
        '10.*',
        '6.*',
    ),
    'key' => 'ev',
    'author' => 'eVolpe, łk',
    'type' => 'module',
    'is_uninstallable' => true,
    'description' => 'Custom Logger that storage in database message and debug backtrace but without dates',
    'name' => 'DBBacktraceLogger',
    'version' => '1.0.11',
    'published_date' => '2020-25-09 23:43:07',
    'type' => 'module',
    'remove_tables' => 'prompt',
);

$installdefs = array(
    'id' => 'DBBacktraceLogger',
    'copy' => array(
        array(
            'from' => '<basepath>/include/SugarLogger/SugarBacktraceLogger.php',
            'to' => 'custom/include/SugarLogger/SugarBacktraceLogger.php',
        ),
    ),
    'relationships' => array(
        array('meta_data' => '<basepath>/ext/relationships/eVLoggerDBMetaData.php'),
    ),
);
