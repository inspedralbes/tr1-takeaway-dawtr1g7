@extends('app')

@section('content')

<div class="container p-4 mt-4">
        <form class="box" action="{{ route('afegir-categoria') }}" method="POST">
            @csrf
            
            @if (session('success'))
                <h6 class="notification is-success is-light">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            <div class="field">
                <label for="nom" class="label">Nom</label>
                <input type="text" name="nom" class="input">
            </div>
            <button type="submit" class="button is-success is-rounded is-small mt-4">AFEGIR CATEGORIA</button>
            <a href="{{ route('categories') }}" class="button is-danger is-rounded is-small mt-4">CANCELAR</a>
        </form>
    </div>
@endsection