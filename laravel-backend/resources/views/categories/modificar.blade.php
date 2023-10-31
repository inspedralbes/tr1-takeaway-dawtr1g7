@extends('app')

@section('content')
<div class="container p-4 mt-4">
        <form class="box" action="{{ route('modificar-categoria', ['id' => $categoria->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            @if (session('success'))
                <h6 class="notification is-success is-light">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            <div class="field">
                <label for="nom" class="label">Nom</label>
                <input type="text" name="nom" class="input" value="{{ $categoria->nom }}">
            </div>
            <button type="submit" class="button is-warning is-rounded">MODIFICAR CATEGORIA</button>
        </form>
    </div>
@endsection