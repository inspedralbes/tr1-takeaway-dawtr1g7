@extends('app')

@section('content')
<div class="container w-50 border p-4 mt-4">
        <form action="{{ route('modificar-llibre', ['id' => $llibre->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="titol" class="form-label">Titol</label>
                <input type="text" name="titol" class="form-control" value="{{ $llibre->titol }}">
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" name="autor" class="form-control" value="{{ $llibre->autor }}">
            </div>
            <div class="mb-3">
                <label for="descripcio" class="form-label">Descripció</label>
                <input type="text" name="descripcio" class="form-control" value="{{ $llibre->descripcio }}">
            </div>
            <div class="mb-3">
                <label for="editorial" class="form-label">Editorial</label>
                <input type="text" name="editorial" class="form-control" value="{{ $llibre->editorial }}">
            </div>
            <div class="mb-3">
                <label for="any" class="form-label">Any</label>
                <input type="number" name="any" class="form-control" value="{{ $llibre->any }}">
            </div>
            <div class="mb-3">
                <label for="preu" class="form-label">Preu</label>
                <input type="number" name="preu" step="0.01" class="form-control" value="{{ $llibre->preu }}">
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" value="{{ $llibre->isbn }}">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="number" name="categoria" class="form-control" value="{{ $llibre->categoria_id }}">
            </div>
            <div class="mb-3">
                <label for="imatge" class="form-label">Portada</label>
                <input type="text" name="imatge" class="form-control" value="{{ $llibre->img_url }}">
            </div>
            <button type="submit" class="btn btn-primary">MODIFICAR CATEGORIA</button>
        </form>
    </div>
@endsection