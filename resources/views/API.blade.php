@extends('layout')
@section('title','Documentacion')

@section('content')
    <div class="container">

        <h3 class="titles">Documentacion</h3>
        <div class="box">

            <pre>
                //Para obtener informacion de nuestra API necesitamos acceder a la siguiente Ruta:
                "http://localhost:50/pruebaTecnica/public/api/obtenerStats"
                //la cual nos devolverá un json de la forma:
                    {
                        "message": "Tarea realizada",
                        "estadisticas": {
                            "cantidad": 3,
                            "tiempoF": 2.01,
                            "tiempoW": 0,
                            "tiempoTw": 2.026666666666667,
                            "tiempoI": 1.7366666666666666,
                            "tiempoTi": 0,
                            "redF": 1,
                            "redMenosF": 2,
                            "rangoEdad": {
                                "tFacebook": 2,
                                "tWhatsapp": 1,
                                "tTwitter": 2,
                                "tInstagram": 2,
                                "tTiktok": 1
                            }
                        }
                    }



                //Para enviar una encuesta, tenemos que hacer un envio de a la Ruta:
                "http://localhost:50/pruebaTecnica/public/api/enviarEncuesta"
                //habrá que enviarle un request de la siguiente forma:
                [▼
                    "correo" => "oswaldtorrealba1@gmail.com",
                    "edad" => "1",
                    "sexo" => "1",
                    "favorita" => "1",
                    "horas_facebook" => "0",
                    "minutos_facebook" => "0",
                    "horas_Twitter" => "0",
                    "minutos_Twitter" => "0",
                    "horas_Whatsapp" => "0",
                    "minutos_Whatsapp" => "0",
                    "horas_Instagram" => "0",
                    "minutos_Instagram" => "0",
                    "horas_Tiktok" => "0",
                    "minutos_Tiktok" => "0",
                ]


                //Si el registro funcionó correctamente, se mostrará el mensaje:
                {
                    "message": "Encuesta Creada Correctamente"
                }

                //En caso contrario, si no se validan las condiciones, como un correo unico por encuesta, se mostrará:
                {
                    "message": "Registro Fallido, correo existente",
                }
            </pre>
        </div>
    </div>

@endsection

