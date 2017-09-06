<?php namespace Rainlab\Blog\Components;

use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Post as Posts;

class Sidebar extends ComponentBase
{
    public $destacado;

    public $recientes;

    public $populares;


    public function componentDetails()
    {
        return [
            'name'        => 'Sidebar Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRender()
    {
        $this->destacado = Posts::IsPublished()->where('destacado', true)->first();
        $this->recientes = Posts::IsPublished()->orderBy('published_at')->limit(4)->get();
        $this->populares = Posts::IsPublished()->orderBy('visits')->limit(3)->get();
    }
}
