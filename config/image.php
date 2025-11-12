<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',
    // Index Size
    'index-image-sizes' => [
        'small' => [
            'width' => env('IMAGE_SMALL_WIDTH', 400),
            'height' => env('IMAGE_SMALL_HEIGHT', 225),
        ],
        'medium' => [
            'width' => env('IMAGE_MEDIUM_WIDTH', 800),
            'height' => env('IMAGE_MEDIUM_HEIGHT', 450),
        ],
        'large' => [
            'width' => env('IMAGE_LARGE_WIDTH', 1920),
            'height' => env('IMAGE_LARGE_HEIGHT',  1080),
        ],
    ],
    'default-current-index-image' => env('DEFAULT_CURRENT_INDEX_IMAGE', 'large'),



];
