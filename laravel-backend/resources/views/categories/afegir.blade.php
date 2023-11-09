@extends('app')

@section('content')

<div class="container p-4 mt-4">
        <form class="box container__form" action="{{ route('afegir-categoria') }}" method="POST">
            @csrf
            
            @if (session('success'))
                <h6 class="notification is-success is-light">{{ session('success') }}</h6>
            @endif

            @error('nom')
                <h6 class="notification is-danger is-light">{{ $message }}</h6>
            @enderror

            <div class="field">
                <label for="nom" class="label">Nom</label>
                <input type="text" name="nom" class="input">
            </div>
            <button type="submit" class="button button--icon is-success is-rounded is-responsive mt-4"><p>AFEGIR CATEGORIA</p><img class="icon" src="{{url('/img/plus.png')}}" alt="suma" width=23 height=23></button>
            <a href="{{ route('categories') }}" class="button is-danger is-rounded is-responsive mt-4">CANCEL·LAR <img class="icon-right" src="{{url('/img/cross.png')}}" alt="creu" width=30 height=30></a>
        </form>
    </div>
@endsection