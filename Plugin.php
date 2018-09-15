<?php namespace DevCatch\SslSupport;

use Backend;
use System\Classes\PluginBase;
use Illuminate\Support\Facades\Route;
use DevCatch\SslSupport\Models\Settings;

/**
 * SslSupport Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'SSL Support',
            'description' => 'SSL Utilities',
            'author'      => 'DevCatch',
            'icon'        => 'icon-lock'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        $settings = Settings::instance();

        Route::get($settings->url_1, function() use ($settings) {
            return $settings->response_1;
        });

        Route::get($settings->url_2, function() use ($settings) {
            return $settings->response_2;
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'DevCatch\SslSupport\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'devcatch.sslsupport.some_permission' => [
                'tab' => 'SslSupport',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'sslsupport' => [
                'label'       => 'SslSupport',
                'url'         => Backend::url('devcatch/sslsupport/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['devcatch.sslsupport.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'ssl_suppport' => [
                'label' => 'SSL Support',
                'description' => 'Manage SSL Settings',
                'icon' => 'icon-lock',
                'class' => 'DevCatch\SslSupport\Models\Settings',
            ]
        ];
    }
}
