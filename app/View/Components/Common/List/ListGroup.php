<?php

namespace App\View\Components\Common\List;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Ramsey\Collection\Collection;

class ListGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public bool $hasChildren,
        public ?Collection $children = null,
        public ?string $route = null,
        public ?string $class = null,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.list.list-group');
    }
}
