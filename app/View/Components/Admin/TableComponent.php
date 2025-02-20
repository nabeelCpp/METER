<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent extends Component
{
    public $headers;
    public $columns;
    public $data;
    public $actions;
    public $pagination;
    public $showIndex;
    /**
     * Create a new component instance.
     * @param array $headers Table headers
     * @param \Illuminate\Database\Eloquent\Collection $data Table data
     * @param array $actions Actions (edit, delete, etc.)
     * @param bool $pagination Enable pagination
     */
    public function __construct($headers = [], $data = [], $columns = [], $actions = [], $pagination = true, $showIndex=true)
    {
        $this->headers = $headers;
        $this->data = $data;
        $this->columns = $columns;
        $this->actions = $actions;
        $this->pagination = $pagination;
        $this->showIndex = $showIndex;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.table-component', [
            'headers' => $this->headers,
            'data' => $this->data,
            'actions' => $this->actions,
            'pagination' => $this->pagination,
            'columns' => $this->columns
        ]);
    }
}
