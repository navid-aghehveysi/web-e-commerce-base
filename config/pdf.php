<?php

return [
    'mode'          => 'utf-8',
    'format'        => 'A4',
    'author'        => '',
    'subject'       => '',
    'keywords'      => '',
    'creator'       => 'Laravel Pdf',
    'display_mode'  => 'fullpage',
    'tempDir'       => base_path('storage/framework/temp/'),
    'font_path' => base_path('resources/fonts/vazir/ttf'),
    'font_data' => [
        'examplefont' => [
            'R'  => 'Vazirmatn-Regular.ttf',    // regular font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ],
//        'fontawesome' => [
//            'R'  => 'fontawesome-webfont.ttf',    // regular font
//        ]
    ],
    'margin_top' =>   8,        // margin top
    'margin_bottom' =>   12,     // margin bottom
    'margin_header' =>   false,     // margin header
    'margin_footer'	=> false,
    'margin_right'	=> 12,
    'margin_left'	=> 12,
];
