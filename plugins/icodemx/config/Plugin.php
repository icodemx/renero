<?php namespace Icodemx\Config;

use Backend;
use System\Classes\PluginBase;

/**
 * Config Plugin Information File
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
            'name'        => 'Config',
            'description' => 'No description provided yet...',
            'author'      => 'Icodemx',
            'icon'        => 'icon-leaf'
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
            'Icodemx\Config\Components\MyComponent' => 'myComponent',
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
            'icodemx.config.some_permission' => [
                'tab' => 'Config',
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
            'config' => [
                'label'       => 'Config',
                'url'         => Backend::url('icodemx/config/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['icodemx.config.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'makeGodinez' => function ($text) {
                    $date = explode(" ", $text);
                    setlocale(LC_ALL, "es_MX.utf8");

                    return ucwords(strftime('%d %B %Y', strtotime($date[0])));
                }
            ],
            'functions' => [
                'limit' => function ($text, $limit) {
                    if ($text == '') {
                        return '';
                    }
                    if (strlen($text) > $limit) {
                        $chars = $limit;
                        $text = $text . " ";
                        $text = substr($text, 0, $chars);
                        $text = substr($text, 0, strrpos($text, ' '));
                        $text = $text . "...";

                        return $text;
                    } else {
                        return $text;
                    }
                }
            ]
        ];
    }
}
