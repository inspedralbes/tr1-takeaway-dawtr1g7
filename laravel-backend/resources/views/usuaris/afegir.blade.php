@extends('app')

@section('content')
<div class="container p-4 mt-4">
        <form class="box container__form" action="{{ route('afegir-usuari') }}" method="POST" enctype="multipart/form-data">
            @csrf


            @error('name')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror
            @error('email')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror
            @error('password')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror
            @error('password_confirmation')
                <h6 class="notification is-danger is-light">La confirmacio de contrasenya no coincideix </h6>
            @enderror
            @error('telefon')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            <div class="field">
                <label for="nom" class="label">Nom</label>
                <input type="text" id="nom" name="name" class="input">
            </div>
            <div class="field">
                <label for="mail" class="label">Email</label>
                <input type="text" id="mail" name="email" class="input">
            </div>
            <div class="field">
                <label for="contrasenya" class="label">Contrasenya</label>
                <input type="password" id="contrasenya" name="password" class="input">
            </div>
            <div class="field">
                <label for="contrasenya" class="label">Confirmació contrasenya</label>
                <input type="password" id="contrasenya" name="password_confirmation" class="input">
            </div>
            <div class="field">
                <label for="telef" class="label">Telèfon</label>
                <input type="text" id="telef" name="telefon" class="input">
            </div>
            <button type="submit" class="button button--icon is-success is-rounded is-responsive mt4"><p>AFEGIR USUARI</p><img class="icon" src="{{url('/img/plus.png')}}" alt="suma" width=23 height=23></button>
            <a href="{{ route('usuaris') }}" class="button button--icon is-danger is-rounded is-responsive mt-4"><p>CANCEL·LAR</p><img class="icon" src="{{url('/img/cross.png')}}" alt="creu" width=30 height=30></a>
        </form>
    </div>
@endsection