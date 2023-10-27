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
                <label for="estats" class="form-label">Estat: </label>
                <!--<input list="estats" name="estat" class="form-control" value="{{ $comanda->estat }}">-->
                <select name="estats" id="estats">
                    <option value="petició_rebuda">Petició Rebuda</option>
                    <option value="en_procés">En Procés</option>
                    <option value="esperant_recollit">Esperant ser recollit</option>
                    <option value="recollit">Recollit</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">MODIFICAR ESTAT</button>
        </form>
    </div>
@endsection