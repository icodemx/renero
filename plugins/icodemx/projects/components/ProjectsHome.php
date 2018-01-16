<?php namespace Icodemx\Projects\Components;

use Cms\Classes\ComponentBase;
use Icodemx\Projects\Models\Project;

class ProjectsHome extends ComponentBase
{

    public $projects;
    public function componentDetails()
    {
        return [
            'name'        => 'ProjectsHome Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function init()
    {
        $this->projects = Project::remember(config('cache.eloquent'))->get();
    }
}
