<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Class Namespace
    |--------------------------------------------------------------------------
    |
    | This value sets the root namespace for Livewire component classes in
    | your application. This value affects component auto-discovery and
    | any Livewire file helper commands, like `artisan make:livewire`.
    |
    | After changing this item, run: `php artisan livewire:discover`.
    |
    */

    'class_namespace' => 'App\\Http\\Livewire',

    /*
    |--------------------------------------------------------------------------
    | View Path
    |--------------------------------------------------------------------------
    |
    | This value sets the path for Livewire component views. This affects
    | file manipulation helper commands like `artisan make:livewire`.
    |
    */

    'view_path' => resource_path('views/livewire'),

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | The default layout view that will be used when rendering a component via
    | Route::get('/some-endpoint', SomeComponent::class);. In this case the
    | the view returned by SomeComponent will be wrapped in "layouts.app"
    |
    */

    'layout' => 'layouts.base',

    /*
    |--------------------------------------------------------------------------
    | Livewire Temporary File Uploads Endpoint Configuration
    |--------------------------------------------------------------------------
    |
    | Livewire handles file uploads by storing uploads in a temporary directory
    | before the file is validated and stored permanently. All file uploads
    | are directed to a global endpoint for temporary storage. The config
    | items below are used for customizing the way the endpoint works.
    |
    */

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

    /*
    |--------------------------------------------------------------------------
    | Render On Redirect
    |--------------------------------------------------------------------------
    |
    | This value determines whether Livewire will render before it's redirected
    | or not. Setting it to "false" (default) will mean the render method is
    | skipped when redirecting. And "true" will mean the render method is
    | run before redirecting. Browsers bfcache can store a potentially
    | stale view if render is skipped on redirect.
    |
    */

    'render_on_redirect' => false,

    /**
     * New config options
     * Need to create documentation
     */

    'legacy_model_binding' => true,

    'inject_assets' => true,

    'inject_morph_markers' => true,

    'navigate' => false,

];
