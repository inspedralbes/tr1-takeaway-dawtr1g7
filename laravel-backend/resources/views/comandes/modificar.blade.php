@extends('app')

@section('content')
<div class="container w-50 border p-4 mt-4">
        <form action="{{ route('modificar-comanda', ['id' => $comanda->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="estat" class="form-label">Estat: </label>
                <!--<input list="estats" name="estat" class="form-control" value="{{ $comanda->estat }}">-->
                <select name="estat">
                    <option value="Petició Rebuda">Petició Rebuda</option>
                    <option value="En procés">En Procés</option>
                    <option value="Esperant ser recollit">Esperant ser recollit</option>
                    <option value="Recollit">Recollit</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="MODIFICAR ESTAT">
        </form>
    </div>
@endsection

                