<?php

namespace App\View\Components\Common\List;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $icon,
        public ?string $link = null,
        public ?string $route = null,
        public ?string $itemStyle = null,
        public ?string $iconStyle = null,
        public ?string $titleStyle = null,

    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.list.list-item');
    }
}
