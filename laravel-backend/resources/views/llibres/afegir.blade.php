@extends('app')

@section('content')
<div class="container p-4 mt-4">
        <form class="box container__form" action="{{ route('afegir-llibre') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if (session('success'))
                <h6 class="notification is-success is-light">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            <div class="field">
                <label for="titol" class="label">Titol</label>
                <input type="text" name="titol" class="input">
            </div>
            <div class="field">
                <label for="autor" class="label">Autor</label>
                <input type="text" name="autor" class="input">
            </div>
            <div class="field">
                <label for="descripcio" class="label">Descripció</label>
                <input type="text" name="descripcio" class="input">
            </div>
            <div class="field">
                <label for="editorial" class="label">Editorial</label>
                <input type="text" name="editorial" class="input">
            </div>
            <div class="field">
                <label for="any" class="label">Any</label>
                <input type="number" name="any" class="input">
            </div>
            <div class="field">
                <label for="preu" class="label">Preu</label>
                <input type="number" name="preu" step="0.01" class="input">
            </div>
            <div class="field">
                <label for="isbn" class="label">ISBN</label>
                <input type="text" name="isbn" class="input">
            </div>
            <div class="field">
                <label for="categoria" class="label">Categoria</label>
                <input type="number" name="categoria" class="input">
            </div>
            <div class="field">
                <label for="imatge" class="label">Portada</label>
                <input type="text" name="imatge" class="input">
            </div>
            <button type="submit" class="button is-success is-rounded is-responsive mt-4">AFEGIR LLIBRE <img class="icon-right" src="{{url('/img/plus.png')}}" alt="suma" width=23 height=23></button>
            <a href="{{ route('llibres') }}" class="button is-danger is-rounded is-responsive mt-4">CANCELAR <img class="icon-right" src="{{url('/img/cross.png')}}" alt="creu" width=30 height=30></a>
            
        </form>
    </div>
@endsection