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
        //$encuesta = $this->encuestaRepo->all(Encuesta::class);
        $estadisticas =$this->encuestaRepo->info();
        json_encode($estadisticas);
        return view('estadisticas',['estadisticas'=>$estadisticas]);
    }

    public function create(Request $request){
        $rules=[
            'correo'=>'required|string|max:255|unique:encuestas'
        ];
        $validator = Validator::make(
            $request->only('correo'),
            $rules
        );
        
        if($validator->fails()){
            redirect()->back()->withErrors($validator)->withInput();
        }
        
        //dd($request->correo);
        $encuesta = Encuesta::create([
            'Correo'=>$request->correo,
            'Sexo'=>$request->sexo,
            'Edad'=>$request->edad,
            'RedFavorita'=>$request->favorita,
            'tFacebook'=>($request->horas_facebook+($request->minutos_facebook)/60),
            'tWhatsapp'=>($request->horas_Whatsapp+($request->minutos_Whatsapp)/60),
            'tTwitter'=>($request->horas_Twitter+($request->minutos_Twitter)/60),
            'tInstagram'=>($request->horas_Instagram+($request->minutos_Instagram)/60),
            'tTiktok'=>($request->horas_Tiktok+($request->minutos_Tiktok)/60),
            
        ]);
        return redirect('/');
    }
}
