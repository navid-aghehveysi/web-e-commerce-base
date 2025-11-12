<?php

namespace App\View\Components\Common\List;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Lists extends Component
{
    public $lists;
    public $itemStyle;
    public $iconStyle;
    public $titleStyle;
    /**
     * Create a new component instance.
     */
    public function __construct($model,?string $itemStyle = null, ?string $iconStyle = null, ?string $titleStyle = null)
    {
        $this->lists = (new $model)->with('children')->get();
        $this->itemStyle = $itemStyle;
        $this->iconStyle = $iconStyle;
        $this->titleStyle = $titleStyle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.list.lists');
    }
}
