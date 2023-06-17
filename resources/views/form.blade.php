@extends('layout')
@section('content')
    <form action="{{route("enviar")}}" method="POST"enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo"placeholder="Ingrese el correo" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad</label>
            <select name="edad" id="edad">
                <option value="1">18 - 25</option>
                <option value="2">26 - 33</option>
                <option value="3">34 - 40</option>
                <option value="4">40+</option>
            </select >
        </div>

        <div class="form-group">
            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo">
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Non-binary</option>
            </select>
        </div>

        <div class="form-group">
            <label for="favorita">Red social favorita</label>
            <select name="favorita">
                <option value="1">Facebook</option>
                <option value="2">Whatsapp</option>
                <option value="3">Twitter</option>
                <option value="4">Instagram</option>
                <option value="5">Tiktok</option>
            </select>
        </div>

        <div class="form-group">
            <label for="facebook"class="titles">Facebook</label>
            <input type="number" min="0" class="form-control" id="horas" name="horas facebook" required placeholder="Horas al dia que usa Facebook">
            <input type="number"min="0" class="form-control" id="minutos" name="minutos facebook" required placeholder="Minutos al dia que usa Facebook">
        </div>
        <div class="form-group">
            <label for="Twitter"class="titles">Twitter</label>
            <input type="number" min="0" class="form-control" id="horas" name="horas Twitter" required placeholder="Horas al dia que usa Twitter">
            <input type="number" min="0"class="form-control" id="minutos" name="minutos Twitter" required placeholder="Minutos al dia que usa Twitter">
        </div>
        <div class="form-group">
            <label for="Whatsapp"class="titles">Whatsapp</label>
            <input type="number" min="0" class="form-control" id="horas" name="horas Whatsapp" required placeholder="Horas al dia que usa Whatsapp">
            <input type="number"min="0" class="form-control" id="minutos" name="minutos Whatsapp" required placeholder="Minutos al dia que usa Whatsapp">
        </div>
        <div class="form-group">
            <label for="Instagram"class="titles">Instagram</label>
            <input type="number" min="0" class="form-control" id="horas" name="horas Instagram" required placeholder="Horas al dia que usa Instagram">
            <input type="number"min="0" class="form-control" id="minutos" name="minutos Instagram" required placeholder="Minutos al dia que usa Instagram">
        </div>
        <div class="form-group">
            <label for="Tiktok"class="titles">Tiktok</label>
            <input type="number" min="0" class="form-control" id="horas" name="horas Tiktok" required placeholder="Horas al dia que usa Tiktok">
            <input type="number"min="0" class="form-control" id="minutos" name="minutos Tiktok" required placeholder="Minutos al dia que usa Tiktok">
        </div>

        <button type="submit" class="btn btn-warning">Enviar</button>
    </form>
        

@endsection