<?php

return [

    'class_namespace' => 'App\\Livewire',

    'view_path' => resource_path('views/livewire'),

    'layout' => 'layouts.base',

    'temporary_file_upload' => [
        'disk' => 'local',          // Example: 'local', 's3'              Default: 'default'
        'rules' => ['image', 'max:12288'],       // Example: ['file', 'mimes:png,jpg']  Default: ['required', 'file', 'max:12288'] (12MB)
        'directory' => 'tmp',       // Example: 'tmp'                      Default  'livewire-tmp'
        'middleware' => null,       // Example: 'throttle:5,1'             Default: 'throttle:60,1'
        'preview_mimes' => [        // Supported file types for temporary pre-signed file URLs.
            'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
            'mov', 'avi', 'wmv', 'mp3', 'm4a',
            'jpg', 'jpeg', 'mpga', 'webp', 'wma',
        ],
        'max_upload_time' => 1, // Max duration (in minutes) before an upload gets invalidated.
    ],

    'render_on_redirect' => false,

    'legacy_model_binding' => true,

    'inject_assets' => true,

    'inject_morph_markers' => true,

    'navigate' => false,

];
