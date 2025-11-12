<?php

namespace App\Actions\Panel\SubmoduleItem\Commands;


use App\Repositories\Eloquent\SubmoduleItem\SubmoduleItemWriteRepository;
use enshrined\svgSanitize\Sanitizer;

class CreateSubmoduleItemCommand
{
    public function __construct(
        protected SubmoduleItemWriteRepository $repository,
        protected Sanitizer $sanitizer
    ){}

    public function __invoke(array $data)
    {


        if($data['icon'])
        {
            $data['icon'] = $this->sanitizer->sanitize($data['icon']->getContent());
        }
        $this->repository->create($data);

    }
}
