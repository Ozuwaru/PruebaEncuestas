<?php
namespace App\Repository;
use Illuminate\Http\Request;



interface iEncuestasRepo{
    function all($model);
    function cantidad($model);
    function create(Request $request, bool $page=false);
}