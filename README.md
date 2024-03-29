## App de Encuestas
This is a survey app, on which the users will be interrogated about the web page most used by them.
<br>
Una vez descargado el repositorio, lo primero sera usar el siguiente comando en una consola abierta en la raiz del repositorio:
<pre>
    php artisan migrate
</pre>
<br>
Este comando nos creará las bases de datos y son clave para el funcionamiento del codigo.
<br>
Luego de esto, podremos ejecutar el repositorio localmente y tendremos tres posibles rutas a acceder.
<br>
"/public/"
<br>
Será la vista principal y nos permitirá obtener toda la info de nuestra base de Datos.
<br>
"/public/encuestas"
<br>
Será nuestro apartado de encuesta y tendrá un formulario para enviar la encuesta.
<br>
"public/documentacionAPI"
<br>
Tendrá la documentación para utilizar nuestra API, sin embargo, aqui estará de igual forma:br>br>

//Para obtener informacion de nuestra API necesitamos acceder a la siguiente Ruta:<br>
                "public/api/obtenerStats"<br>
                //la cual nos devolverá un json de la forma:<br>

                
                <pre>
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
                </pre>

//Para enviar una encuesta, tenemos que hacer un envio de a la Ruta:<br>


                "public/api/enviarEncuesta"<br>
                //habrá que enviarle un request de la siguiente forma:<br>
                {
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
                }


                //Si el registro funcionó correctamente, se mostrará el mensaje:<br>
                {
                    "message": "Encuesta Creada Correctamente"
                }

                //En caso contrario, si no se validan las condiciones, como un correo unico por encuesta, se mostrará:<br>
                {
                    "message": "Registro Fallido, correo existente",
                }
            
