@extends('app')

@section('content')
<div class="container w-50 border p-4 mt-4">
        <form action="{{ route('modificar-categoria', ['id' => $categoria->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $categoria->nom }}">
            </div>
            <button type="submit" class="btn btn-primary">MODIFICAR CATEGORIA</button>
        </form>
    </div>
@endsection