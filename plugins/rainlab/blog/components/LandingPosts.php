<?php namespace Rainlab\Blog\Components;

use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Post;

class LandingPosts extends ComponentBase
{
    public $destacado;

    public $posts;

    public $recientes;

    public $populares;

    public function componentDetails()
    {
        return [
            'name' => 'LandingPosts Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRender()
    {
        $this->destacado = Post::with('user')->IsPublished()->where('destacado', true)->first();
        $this->posts = Post::with('user')->IsPublished()->orderBy('published_at')->get();
        $this->recientes = Post::with('user')->IsPublished()->orderBy('published_at')->limit(4)->get();
        $this->populares = Post::with('user')->IsPublished()->orderBy('visits')->limit(3)->get();
    }
}
