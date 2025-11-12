<?php

namespace App\Http\Controllers\Panel;

use App\Actions\Panel\Module\Queries\FetchAllModulesQuery;
use App\Actions\Panel\Submodule\Commands\ChangeStatusSubmoduleCommand;
use App\Actions\Panel\Submodule\Commands\CreateSubmoduleCommand;
use App\Actions\Panel\Submodule\Commands\DeleteSubmoduleCommand;
use App\Actions\Panel\Submodule\Commands\UpdateSubmoduleCommand;
use App\Actions\Panel\Submodule\Queries\FetchAllSubmodulesQuery;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Submodule\SubmoduleRequest;
use App\Models\Submodule;
use App\QueryHelper\WithRelations;


class SubmoduleController extends Controller
{
    public function __construct(
        public FetchAllSubmodulesQuery $fetchAllSubmodulesQuery,
        public FetchAllModulesQuery $fetchAllModulesQuery,
        public WithRelations $withRelations
    ){}

    public function query()
    {
        return ($this->fetchAllSubmodulesQuery)();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submodules = $this->withRelations($this->query() , ['module' , 'submoduleItems' ])->get();
        return view('panel.submodule.index', compact('submodules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(

    )
    {
        $modules = ($this->fetchAllModulesQuery)()->get();

        $statuses = Status::options();
        return view('panel.submodule.create', compact('modules', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CreateSubmoduleCommand $createSubmoduleCommand,
        SubmoduleRequest $request
    )
    {
        $createSubmoduleCommand($request->validated());
        return $this->redirectSuccess('panel.submodule.index','swal-success');
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
    public function edit(Submodule $submodule)
    {
        $modules = ($this->fetchAllModulesQuery)()->get();

        $statuses = Status::options();

        return view('panel.submodule.edit', compact('submodule', 'modules', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateSubmoduleCommand $updateSubmoduleCommand,
        SubmoduleRequest $request,
        Submodule $submodule
    )
    {
        $updateSubmoduleCommand($request->validated(), $submodule);
        return $this->redirectSuccess('panel.submodule.index','swal-success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        DeleteSubmoduleCommand $deleteSubmoduleCommand,
        Submodule $submodule
    )
    {
        $deleteSubmoduleCommand($submodule);
        return $this->redirectSuccess('panel.submodule.index','swal-success');
    }
    public function status(
        ChangeStatusSubmoduleCommand $changeStatusSubmoduleCommand,
        Submodule $submodule
    )
    {
        $changeStatusSubmoduleCommand($submodule);
        return response()->json([
            'checked' => $submodule->status,
            'toast' => [
                'active' => 'ساب ماژول مورد نظر با موفقیت فعال شد',
                'inActive' => 'ساب ماژول مورد نظر با موفقیت غیر فعال شد'
            ]
        ]);
    }
}
