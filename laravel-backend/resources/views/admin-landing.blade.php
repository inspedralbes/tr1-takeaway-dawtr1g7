@extends('app')

@section('content')
<button class="button is-link is-rounded is-large mt-6" onclick="document.location='http:\/\/127.0.0.1:5501/FrontEnd/'">TORNAR A CATÀLEG</button>
<div class="info">Administra des d'aquesta secció el catàleg de llibres disponibles, les seves categories així com les comandes dels clients.</div>

<div class="graella">
<button onclick="document.location='{{route('llibres')}}'" type="button" class="item">
<h2>LLIBRES</h2>
<img src="{{url('/img/llibres.jpg')}}" alt="llibres" width="200" height="200">
</button>
<button onclick="document.location='{{route('categories')}}'" type="button" class="item">
<h2>CATEGORIES</h2>
<img src="{{url('/img/categories.jpeg')}}" alt="llibres" width="200" height="200">
</button>
<button onclick="document.location='{{route('comandes')}}'" type="button" class="item">
<h2>COMANDES</h2>
<img src="{{url('/img/comandes.jpeg')}}" alt="llibres" width="200" height="200">
</button>
</div>
@endsection