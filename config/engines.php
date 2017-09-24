<?php

// Load environment variables as an array
$env = parse_ini_file('../.env');

return array(
    'defaults' => array(
        'engine' => 'ddg',
    ),
    'engines' => array(
        'yandex' => array(
            'full_name' => 'Яндекс',
            'key'       => $env['YANDEX_KEY'],
            'user'      => $env['YANDEX_USER'],
        ),
        'ddg' => array(
            'full_name' => 'DuckDuckGo',
        ),
        'google' => array(
            'full_name' => 'Google',
            'key'       => $env['GOOGLE_KEY'],
            'cx'        => $env['GOOGLE_CX'],
        ),
    ),
);
