<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Repository\EncuestasRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EncuestasController extends Controller
{   
    private EncuestasRepo $encuestaRepo;
    public function __construct(EncuestasRepo $repo)
    {
        $this->encuestaRepo = $repo;
    }

    public function index(){
        $estadisticas =$this->encuestaRepo->info(true);
        json_encode($estadisticas);
        return view('estadisticas',['estadisticas'=>$estadisticas]);
    }

    public function create(Request $request){
        
        $this->encuestaRepo->create($request,true);
        return redirect('/');
    }
}
