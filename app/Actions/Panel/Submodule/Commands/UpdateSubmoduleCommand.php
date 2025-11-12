<?php

namespace App\Actions\Panel\Submodule\Commands;

use App\Models\Submodule;
use App\Repositories\Eloquent\Submodule\SubmoduleWriteRepository;
use enshrined\svgSanitize\Sanitizer;
use Illuminate\Support\Arr;

class UpdateSubmoduleCommand
{
    public function __construct(
        protected SubmoduleWriteRepository $repository,
        protected Sanitizer $sanitizer
    ){}
    public function __invoke(array $data, Submodule $submodule)
    {


        if(Arr::has($data,'icon')) {
            $data['icon'] = $this->sanitizer->sanitize($data['icon']->getContent());
        }
        $this->repository->update($data, $submodule);
    }
}
