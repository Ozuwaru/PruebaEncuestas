<?php
namespace App\Repository;

use App\Models\Encuesta;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class EncuestasRepo implements iEncuestasRepo{
    
   
    function create(Request $request, bool $page=NULL){
        $rules=[
            'correo'=>'required|string|max:255|unique:encuestas'
        ];
        $validator = Validator::make(
            $request->only('correo'),
            $rules
        );
        if($validator->fails() ){
            if(!$page){
               return response()->json([
                   'message'=>'Registro Fallido, correo existente'
               ],405);
            }

            return redirect()->back()->withErrors($validator)->withInput();
        }

        Encuesta::create([
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
        if(!$page){
            return response()->json([
                'message'=>'Encuesta Creada Correctamente'
            ],201);
        }
    }
    function all($model):Collection{
        $info = $model::get();
        return $info;
    }
    
    function cantidad($model){
        return $model::count();
    }
    function rangoEdad(Collection $datos,$tiempo){
        //contador de usos por cada edad
        $c =[
            1=>0,
            2=>0,
            3=>0,
            4=>0
        ];
        
        foreach($datos as $fila){
            if($fila[$tiempo]>0){
                $c[$fila['Edad']]++;
            }
        }

        return $this->maximo(5,$c);
    }
    function maximo($c,array $arr){
        $mas=1;
        for($i=1;$i<$c;$i++){
            if($arr[$i]>$arr[$mas]){
                $mas=$i;
            }
        }
        return $mas;
    }
    function redesPorEdad(Collection $encuesta){
        //$encuesta = $this->all(Encuesta::class);
        $info=[
            'tFacebook'=>1,
            'tWhatsapp'=>1,
            'tTwitter'=>1,
            'tInstagram'=>1,
            'tTiktok'=>1
        ];
        
        foreach($info as $red=>$edad){
  
            $info[$red]=$this->rangoEdad($encuesta,$red);
        }
        return $info;
    }

    function info(bool $page=false){
        $encuestas = Encuesta::get();
        $cantidad = $encuestas->count();
        if($cantidad<=0){
            $cantidad=1;
        }
        //dd($cantidad);
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

        $info = [
            'cantidad'=>$cantidad,
            'tiempoF'=>$pF,
            'tiempoW'=>$pW,
            'tiempoTw'=>$pTw,
            'tiempoI'=>$pI,
            'tiempoTi'=>$pTi,
            'redF'=>$mas,
            'redMenosF'=>$menos,
            'rangoEdad'=>$this->redesPorEdad($encuestas)
        ];
        if(!$page){
            return response()->json([
                'message'=>'Tarea realizada',
                'estadisticas'=>($info)
            ],200);
        }
        return $info;
    }



}
