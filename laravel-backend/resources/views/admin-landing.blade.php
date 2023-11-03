@extends('app')

@section('content')
<div class="landing-container">
<div class="container__button">
<button class="cataleg button is-link is-rounded is-large mt-6" onclick="redirectToLandingPage()">TORNAR A CATÀLEG</button>
</div>
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
</div>
<script>
    function redirectToLandingPage() {
        let localhost = window.location.hostname == '127.0.0.1'

        if(localhost) {
            window.location.href = 'http://127.0.0.1:5501/FrontEnd/'
        } else {
            window.location.href = '../../FrontEnd'
        }
    }
</script>
@endsection