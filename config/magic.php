<?php

return [

    'urls' => [
        'default' => env('MM2_URL', 'https://form.redemagic.com/api/send'),
        'template' => env('MM2_URL_WITH_TEMPLATE', 'https://form.redemagic.com/api/send/template')
    ],

    'credentials' => [
        'mm2_codigo' => env('MM2_CODIGO', '')
    ],

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    'mm2_destino' => env('MM2_DESTINO', 'principal')

];
