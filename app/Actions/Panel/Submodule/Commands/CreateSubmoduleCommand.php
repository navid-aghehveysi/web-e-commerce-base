<?php

namespace App\Actions\Panel\Submodule\Commands;


use App\Repositories\Eloquent\Submodule\SubmoduleWriteRepository;
use enshrined\svgSanitize\Sanitizer;


class CreateSubmoduleCommand
{
    public function __construct(
        protected SubmoduleWriteRepository $repository,
        protected Sanitizer $sanitizer
    ){}

    public function __invoke(array $data)
    {

        if( $data['icon']){

            $data['icon'] = $this->sanitizer->sanitize($data['icon']->getContent());
        }

        $this->repository->create($data);
    }
}
