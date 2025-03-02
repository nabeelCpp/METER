<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowComponent extends Component
{
    protected $title;
    protected $data;
    protected $fields, $model;
    protected $backUrl;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $fields, $model, $data, $backUrl)
    {
        $this->title = $title;
        $this->data = $data;
        $this->model = $model;
        $this->fields = $fields;
        $this->backUrl = $backUrl;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.show-component', [
            'title' => $this->title,
            'data' => $this->data,
            'fields' => $this->fields,
            'backUrl' => $this->backUrl,
            'model' => $this->model
        ]);
    }
}
