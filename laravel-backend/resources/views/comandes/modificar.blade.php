@extends('app')

@section('content')
<div class="container p-4 mt-4">
        <form class="box container__form" action="{{ route('modificar-comanda', ['id' => $comanda->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            @if (session('success'))
                <h6 class="notification is-success is-light">{{ session('success') }}</h6>
            @endif

            @error('name')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            <div class="field">
                <label for="estat" class="label">Estat: </label>
                <div class="select">
                <select name="estat">
                    <option value="Pendent">Pendent</option>
                    <option value="En preparació">En preparació</option>
                    <option value="Esperant a ser recollida">Esperant a ser recollida</option>
                    <option value="Recollida">Recollida</option>
                </select>
                </div>
            </div>
            <input type="submit" class="button is-warning is-rounded is-responsive mt-4" value="MODIFICAR ESTAT">
            <a href="{{ route('comandes') }}" class="button is-danger is-rounded is-responsive mt-4">CANCEL·LAR <img class="icon-right" src="{{url('/img/cross.png')}}" alt="creu" width=30 height=30></a>
        </form>
    </div>
@endsection

                