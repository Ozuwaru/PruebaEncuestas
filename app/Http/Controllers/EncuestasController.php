<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use app\Repository\iEncuestasRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EncuestasController extends Controller
{   
    private iEncuestasRepo $encuestaRepo;
    public function __construct(iEncuestasRepo $repo)
    {
        $this->encuestaRepo = $repo;
    }

    public function index(){
        $encuesta = $this->encuestaRepo->all();
        dd($encuesta);
        $cantidad = Encuesta::count();
        $encuestas = Encuesta::get();
        $pF=0;
        $pW=0;
        $pTw=0;
        $pI=0;
        $pTi=0;
        $favorita=[
            1=>0,
            2=>0,
            3=>0,
            4=>0,
            5=>0
        ];
        foreach($encuestas as $e){

            $favorita[$e['RedFavorita']]+=1;

            $pF+=$e['tFacebook'];
            $pW+=$e['tWhatsapp'];
            $pTw+=$e['tTwitter'];
            $pI+=$e['tInstagram'];
            $pTi+=$e['tTiktok'];
        }
        $pF/=$cantidad;
        $pW/=$cantidad;
        $pTw/=$cantidad;
        $pI/=$cantidad;
        $pTi/=$cantidad;
        $menos=1;
        $mas=1;
        for($i=1;$i<6;$i++){
            if($favorita[$i]>$favorita[$mas]){
                $mas=$i;
            }else if($favorita[$i]<$favorita[$menos]){
                $menos=$i;
            }
        }
        $favorita=NULL;

        dd($mas,$menos);
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
