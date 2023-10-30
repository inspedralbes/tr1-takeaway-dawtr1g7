@extends('app')

@section('content')
<div class="container w-50 border p-4 mt-4">
        <form action="{{ route('afegir-categoria') }}" method="POST">
            @csrf
            
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">AFEGIR CATEGORIA</button>
        </form>
    </div>
@endsection