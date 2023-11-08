@extends('app')

@section('content')
<div class="container p-4 mt-4">
        <form class="box container__form" action="{{ route('modificar-usuari', ['id' => $usuari->id]) }}" method="POST">
            @method('PATCH')
            @csrf

            @if (session('success'))
                <h6 class="notification is-success is-light">{{ session('success') }}</h6>
            @endif

            @error('name')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror
            @error('email')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror
            @error('telefon')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            <div class="field">
                <label for="titol" class="label">Nom</label>
                <input type="text" name="name" class="input" value="{{ $usuari->name }}">
            </div>
            <div class="field">
                <label for="autor" class="label">Email</label>
                <input type="text" name="email" class="input" value="{{ $usuari->email }}">
            </div>
            <div class="field">
                <label for="descripcio" class="label">telefon</label>
                <input type="text" name="telefon" class="input" value="{{ $usuari->telefon }}">
            </div>
            <button type="submit" class="button is-success is-rounded is-responsive mt-4">MODIFICAR LLIBRE <img class="icon-right" src="{{url('/img/plus.png')}}" alt="suma" width=23 height=23></button>
            <a href="{{ route('usuaris') }}" class="button is-danger is-rounded is-responsive mt-4">CANCEL·LAR <img class="icon-right" src="{{url('/img/cross.png')}}" alt="creu" width=30 height=30></a>
            
        </form>
    </div>
@endsection