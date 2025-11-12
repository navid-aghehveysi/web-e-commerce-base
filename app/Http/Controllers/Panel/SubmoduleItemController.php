<?php

namespace App\Http\Controllers\Panel;

use App\Actions\Panel\Submodule\Queries\FetchAllSubmodulesQuery;
use App\Actions\Panel\SubmoduleItem\Commands\ChangeStatusSubmoduleItemCommand;
use App\Actions\Panel\SubmoduleItem\Commands\CreateSubmoduleItemCommand;
use App\Actions\Panel\SubmoduleItem\Commands\UpdateSubmoduleItemCommand;
use App\Actions\Panel\SubmoduleItem\Queries\FetchAllSubmoduleItemsQuery;
use App\Enums\Status;
use App\Http\Controllers\Controller;

use App\Http\Requests\Panel\SubmoduleItem\SubmoduleItemRequest;
use App\Models\SubmoduleItem;
use App\QueryHelper\WithRelations;
use Illuminate\Http\Request;

class SubmoduleItemController extends Controller
{
    public function __construct(
        public FetchAllSubmoduleItemsQuery $fetchAllSubmoduleItemsQuery,
        public FetchAllSubmodulesQuery $submodules,
        public WithRelations $withRelations,

    )
    {}

    public function query()
    {
        return ($this->fetchAllSubmoduleItemsQuery)();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submoduleItems = $this->withRelations($this->query(),['submodule'])->get();
        return view('panel.submodule-item.index', compact('submoduleItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $submodules = ($this->submodules)()->get();
        $statuses = Status::options();
        return view('panel.submodule-item.create', compact('submodules', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CreateSubmoduleItemCommand $createSubmoduleItemCommand,
        SubmoduleItemRequest $request
    )
    {
        $createSubmoduleItemCommand($request->validated());
        return $this->redirectSuccess('panel.submodule-item.index','swal-success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubmoduleItem $submoduleItem)
    {
        $submodules = ($this->submodules)()->get();
        $statuses = Status::options();
        return view('panel.submodule-item.edit', compact('submoduleItem', 'submodules', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateSubmoduleItemCommand $updateSubmoduleItemCommand,
        SubmoduleItemRequest $request,
        SubmoduleItem $submoduleItem

    )
    {
        $updateSubmoduleItemCommand($request->validated(), $submoduleItem);
        return $this->redirectSuccess('panel.submodule-item.index','swal-success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function status(
        ChangeStatusSubmoduleItemCommand  $changeStatusSubmoduleItemCommand,
        SubmoduleItem $submoduleItem
    )
    {
        $changeStatusSubmoduleItemCommand($submoduleItem);
        return response()->json([
            'checked' => $submoduleItem->status,
            'toast' => [
                'active' => 'آیتم مورد نظر با موفقیت فعال شد',
                'inActive' => 'آیتم مورد نظر با موفقیت غیر فعال شد'
            ]
        ]);
    }
}
