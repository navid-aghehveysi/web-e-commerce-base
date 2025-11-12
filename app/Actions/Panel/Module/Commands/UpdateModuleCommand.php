<?php

namespace App\Actions\Panel\Module\Commands;

use App\Models\Module;
use App\Repositories\Eloquent\Module\ModuleReadOnlyRepository;
use App\Repositories\Eloquent\Module\ModuleWriteRepository;
use enshrined\svgSanitize\Sanitizer;

class UpdateModuleCommand
{
    public function __construct(
        public ModuleReadOnlyRepository $readOnlyRepository,
        public ModuleWriteRepository $repository,
        public Sanitizer $sanitizer
    ){}

    public function __invoke(array $data,Module $module){
        if(!empty($data['icon'])){
            $data['icon'] = $this->sanitizer->sanitize($data['icon']->getContent());
        }
        $modules = $this->readOnlyRepository->query()->where('order' ,'>=' ,$data['order'])->get();
        $modules->map(function($module){
            $module->order++;
            $module->save();
        });
        $this->repository->update($data,$module);
    }
}
