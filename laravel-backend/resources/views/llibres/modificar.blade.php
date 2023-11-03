@extends('app')

@section('content')
<div class="container p-4 mt-4">
        <form class="box container__form" action="{{ route('modificar-llibre', ['id' => $llibre->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            @if (session('success'))
                <h6 class="notification is-success is-light">{{ session('success') }}</h6>
            @endif

            @error('titol')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            @error('autor')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            @error('descripcio')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            @error('editorial')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            @error('any')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            @error('preu')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            @error('isbn')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            @error('categoria')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            @error('portada')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            <div class="field">
                <label for="titol" class="label">Titol</label>
                <input type="text" name="titol" class="input" value="{{ $llibre->titol }}">
            </div>
            <div class="field">
                <label for="autor" class="label">Autor</label>
                <input type="text" name="autor" class="input" value="{{ $llibre->autor }}">
            </div>
            <div class="field">
                <label for="descripcio" class="label">Descripció</label>
                <input type="text" name="descripcio" class="input" value="{{ $llibre->descripcio }}">
            </div>
            <div class="field">
                <label for="editorial" class="label">Editorial</label>
                <input type="text" name="editorial" class="input" value="{{ $llibre->editorial }}">
            </div>
            <div class="field">
                <label for="any" class="label">Any</label>
                <input type="number" name="any" class="input" value="{{ $llibre->any }}">
            </div>
            <div class="field">
                <label for="preu" class="label">Preu</label>
                <input type="number" name="preu" step="0.01" class="input" value="{{ $llibre->preu }}">
            </div>
            <div class="field">
                <label for="isbn" class="label">ISBN</label>
                <input type="text" name="isbn" class="input" value="{{ $llibre->isbn }}">
            </div>
            <div class="field">
                <label for="categoria" class="label">Categoria</label>
                <input type="number" name="categoria" class="input" value="{{ $llibre->categoria_id }}">
            </div>
            <div class="field">
                <label for="portada" class="label">Portada</label>
                <input type="text" name="portada" class="input" value="{{ $llibre->img_url }}">
            </div>
            <button type="submit" class="button is-warning is-rounded is-responsive mt-4">MODIFICAR LLIBRE <img class="icon-right" src="{{url('/img/update.png')}}" alt="modificar" width=23 height=23></button>
            <a href="{{ route('llibres') }}" class="button is-danger is-rounded is-responsive mt-4">CANCEL·LAR <img class="icon-right" src="{{url('/img/cross.png')}}" alt="creu" width=30 height=30></a>
        </form>
    </div>
@endsection