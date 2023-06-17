<?php
namespace app\Repository;

use App\Models\Encuesta;

class EncuestasRepo implements iEncuestasRepo{


    function all():array{
        $encuestas = Encuesta::get();
        return $encuestas;
    }
}