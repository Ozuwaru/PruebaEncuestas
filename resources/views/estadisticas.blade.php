@extends('layout')
@section('title','Dashboard')

@section('content')
<script>
    function time_convert(num)
 { 
  var hours = Math.floor(num);  
  var minutes = Math.round((num % 1)*60);
  console.log(hours + ":" + minutes);
  return hours + ":" + minutes;         
}
</script>
    <h2 class="titles">Estadisticas</h2>

    <h4>Red favorita: {{$estadisticas['redF']}}</h4>
    <h4>Red menos usada: {{$estadisticas['redMenosF']}}</h4>
    <h4>Tiempo Facebook: <script>document.write(time_convert({{$estadisticas['tiempoF'] }})) </script></h4>
    <h4>Tiempo Whatsapp <script>document.write(time_convert({{$estadisticas['tiempoW'] }})) </script></h4>
    <h4>Tiempo Twitter <script>document.write(time_convert({{$estadisticas['tiempoTw'] }})) </script></h4>
    <h4>Tiempo Instagram <script>document.write(time_convert({{$estadisticas['tiempoI'] }})) </script></h4>
    <h4>Tiempo Tiktok <script>document.write(time_convert({{$estadisticas['tiempoTi'] }})) </script></h4>

    <h2 class="titles">Redes mas usadas por cada Edad:</h2>
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

