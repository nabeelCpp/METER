<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormComponent extends Component
{
    public $action, $method, $fields, $submitText, $model, $formId;
    /**
     * Create a new component instance.
     */
    public function __construct($action, $method = 'POST', $fields = [], $submitText = 'Save', $model = null, $formId = 'dynamicForm')
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->fields = $fields;
        $this->submitText = $submitText;
        $this->model = $model;
        $this->formId = $formId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form-component');
    }
}
