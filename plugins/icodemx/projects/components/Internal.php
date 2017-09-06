<?php namespace Icodemx\Projects\Components;

use Cms\Classes\ComponentBase;
use Icodemx\Projects\Models\Project;
use Illuminate\Support\Facades\Response;

class Internal extends ComponentBase
{

    public $project;

    public function componentDetails()
    {
        return [
            'name'        => 'Internal project Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title' => 'Nombre del projecto',
                'description' => 'URL amigable del proyecto',
                'default' => '{{ :slug }}',
                'type' => 'string'
            ]
        ];
    }

    public function init()
    {
        $slug = $this->property('slug');
        $this->project = Project::where('slug', $slug)->remember(config('cache.eloquent'))->first();
        if (!$this->project) {
            return Response::make($this->controller->run('404'), 404);
        }
    }
}
