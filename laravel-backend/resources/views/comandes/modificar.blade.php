@extends('app')

@section('content')
<div class="container p-4 mt-4">
        <form class="box" action="{{ route('modificar-comanda', ['id' => $comanda->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            @if (session('success'))
                <h6 class="notification is-success is-light">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            <div class="field">
                <label for="estat" class="label">Estat: </label>
                <div class="select">
                <select name="estat">
                    <option value="Petició Rebuda">Petició Rebuda</option>
                    <option value="En procés">En Procés</option>
                    <option value="Esperant ser recollit">Esperant ser recollit</option>
                    <option value="Recollit">Recollit</option>
                </select>
                </div>
            </div>
            <input type="submit" class="button is-warning is-rounded is-small mt-4" value="MODIFICAR ESTAT">
            <a href="{{ route('comandes') }}" class="button is-danger is-rounded is-small mt-4">CANCELAR</a>
        </form>
    </div>
@endsection

                