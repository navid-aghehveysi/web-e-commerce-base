<?php

namespace App\View\Components\Panel\Aside;

use App\Actions\Panel\Module\Queries\FetchAllModulesQuery;
use App\QueryHelper\WithRelations;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{

    public $modules;
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected FetchAllModulesQuery $fetchAllModulesQuery,
        protected WithRelations $withRelations
    )
    {
        $this->modules = ($this->withRelations)(($this->fetchAllModulesQuery)()->orderBy('order','desc'),
            ['submodules.submoduleItems']
        )
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.aside.menu');
    }
}
