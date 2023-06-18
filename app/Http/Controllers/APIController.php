<?php

namespace App\Http\Controllers;

use App\Repository\EncuestasRepo;
use Illuminate\Http\Request;

class APIController extends Controller
{
    private EncuestasRepo $encuestaRepo;
    public function __construct(EncuestasRepo $repo)
    {
        $this->encuestaRepo = $repo;
    }
    public function getD(){
        return $this->encuestaRepo->info();
    }

    public function registrar(Request $request){
        return $this->encuestaRepo->create($request);
    }
}
