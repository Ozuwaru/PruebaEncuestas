@extends('layout')
@section('title','Dashboard')

@section('content')

    <h2 class="title">Estadisticas</h2>

    <h4>Red favorita: {{$estadisticas['redF']}}</h4>
    <h4>Red menos usada: {{$estadisticas['redMenosF']}}</h4>
    <h4>Tiempo Facebook {{$estadisticas['tiempoF']}}</h4>
    <h4>Tiempo Whatsapp {{$estadisticas['tiempoW']}}</h4>
    <h4>Tiempo Twitter {{$estadisticas['tiempoTw']}}</h4>
    <h4>Tiempo Instagram {{$estadisticas['tiempoI']}}</h4>
    <h4>Tiempo Tiktok {{$estadisticas['tiempoTi']}}</h4>

    <h2 class="title">Redes mas usadas por cada Edad:</h2>
    <?php
        $data=[
            'Facebook',
            'Whatsapp',
            'Twitter',
            'Instagram',
            'Tiktok'
        ];
        $edad=[
            1=>'18 - 25',
            2=>'26 - 33',
            3=>'34-40',
            4=>$edad='40+'
        ];
        $c =0;
    ?>
    @foreach ($estadisticas['rangoEdad'] as $item)
 
        <h4>{{$data[$c]}}: {{$edad[$item]}}</h4>
        <?php $c++?>
    @endforeach
    


@endsection