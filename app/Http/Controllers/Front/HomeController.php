<?php

namespace App\Http\Controllers\Front;

use App\Actions\User\Queries\FetchUserQuery;
use App\Http\Controllers\Controller;
use App\QueryHelper\WithRelations;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Mpdf\MpdfException;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class HomeController extends Controller
{
    public function __construct(
        public FetchUserQuery $fetchUserQuery,
        public WithRelations $withRelations,
    ){}
    public function query()
    {
        return ($this->fetchUserQuery)();
    }
    public function withRelations(Builder|Model $queryOrObject, ?array $relations = null): Model|Builder
    {
        return ($this->withRelations)($queryOrObject, $relations);
    }

    public function index()
    {

    }

}
