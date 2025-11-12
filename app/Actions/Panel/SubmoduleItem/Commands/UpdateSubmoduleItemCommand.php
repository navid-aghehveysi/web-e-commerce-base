<?php

namespace App\Actions\Panel\SubmoduleItem\Commands;

use App\Models\SubmoduleItem;
use App\Repositories\Eloquent\SubmoduleItem\SubmoduleItemWriteRepository;
use enshrined\svgSanitize\Sanitizer;
use Illuminate\Support\Arr;

class UpdateSubmoduleItemCommand
{
    public function __construct(
        protected SubmoduleItemWriteRepository $repository,
        protected Sanitizer $sanitizer
    ){}

    public function __invoke(array $data,SubmoduleItem $submoduleItem)
    {


        if(Arr::has($data,'icon'))
        {
            $data['icon'] = $this->sanitizer->sanitize($data['icon']->getContent());
        }
        $this->repository->update($data, $submoduleItem);

    }
}
