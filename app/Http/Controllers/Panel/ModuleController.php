<?php
namespace App\Http\Controllers\Panel;


use App\Actions\Panel\Module\Commands\ChangeStatusModuleCommand;
use App\Actions\Panel\Module\Commands\CreateModuleCommand;
use App\Actions\Panel\Module\Commands\UpdateModuleCommand;
use App\Actions\Panel\Module\Queries\FetchAllModulesQuery;
use App\Enums\CategoryType;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Module\ModuleRequest;
use App\Models\Module;
use Illuminate\Routing\Controllers\HasMiddleware;


class ModuleController extends Controller implements HasMiddleware
{
    public function __construct(
        public FetchAllModulesQuery $fetchAllModulesQuery
    ){
        // $this->authorizeResource(Module::class, 'module');
    }

    public function query()
    {
        return ($this->fetchAllModulesQuery)();
    }

    public function index()
    {
        $modules = $this->query()->get();
        return view('panel.module.index', compact('modules'));
    }

    public function create()
    {
        $statuses = Status::options();


        return view('panel.module.create', compact('statuses'));
    }

    public function store(
        CreateModuleCommand $createModuleCommand,
        ModuleRequest $request
    )
    {
//        dd($request->all());
        $module = $createModuleCommand($request->validated());
        return $this->redirectSuccess('panel.module.index', 'swal-success');
    }

    public function edit(Module $module)
    {
        $statuses = Status::options();


        return view('panel.module.edit', compact('module','statuses'));
    }

    public function update(
        UpdateModuleCommand $updateModuleCommand,
        ModuleRequest $request,
        Module $module
    )
    {
        $updateModuleCommand($request->validated(), $module);
        return $this->redirectSuccess('panel.module.index', 'swal-success');
    }

    public function destroy(string $id)
    {
        //
    }

    public function status(
        ChangeStatusModuleCommand  $changeStatusModuleCommand,
        Module $module
    )
    {
        $status = $changeStatusModuleCommand($module);
        return response()->json([
            'checked' => $module->status,
            'toast' => [
                'active' => 'ماژول مورد نظر با موفقیت فعال شد',
                'inActive' => 'ماژول مورد نظر با موفقیت غیر فعال شد'
            ]
        ]);
    }

    public static function middleware(): array
    {
//        return [
//            new Middleware(function ($request, $next) {
//                $middleware = new TestMiddleware();
//                $middleware->handle($request, $next , 'navid');
//                return $next($request);
//
//            } , only:['index']),
//        ];
        return [];
    }

}
