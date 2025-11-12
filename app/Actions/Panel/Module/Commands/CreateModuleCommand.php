<?php

namespace App\Actions\Panel\Module\Commands;

use App\Repositories\Eloquent\Module\ModuleReadOnlyRepository;
use App\Repositories\Eloquent\Module\ModuleWriteRepository;
use enshrined\svgSanitize\Sanitizer;

class CreateModuleCommand
{
    public function __construct(
        public ModuleReadOnlyRepository $readOnlyRepository,
        public ModuleWriteRepository $repository,
        public Sanitizer $sanitizer
    ){}

    public function __invoke(array $data){
        if($data['icon']){
            $data['icon'] = $this->sanitizer->sanitize($data['icon']->getContent());
        }

        $this->repository->create($data);
    }
}
