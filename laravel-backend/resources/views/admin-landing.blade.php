@extends('app')

@section('content')
<div class="admin-landing-container">
    <div class="admin-landing-container__button">
        <button class="button__cataleg button is-rounded is-large mt-6" onclick="redirectToLandingPage()">TORNAR A CATÀLEG</button>
    </div>
    <div class="admin-landing-container__info">Administra des d'aquesta secció el catàleg de llibres disponibles, les seves categories així com les dades dels clients i les seves comandes.</div>

    <div class="seccions-admin">
        <button onclick="document.location='{{route('llibres')}}'" type="button" class="seccions-admin__item">
            <h2>LLIBRES</h2>
            <img src="{{url('/img/llibres.jpg')}}" alt="llibres" width="200" height="200">
        </button>
        <button onclick="document.location='{{route('categories')}}'" type="button" class="seccions-admin__item">
            <h2>CATEGORIES</h2>
            <img src="{{url('/img/categories.jpeg')}}" alt="categories" width="200" height="200">
        </button>
        <button onclick="document.location='{{route('comandes')}}'" type="button" class="seccions-admin__item">
            <h2>COMANDES</h2>
            <img src="{{url('/img/comandes.jpeg')}}" alt="comandes" width="200" height="200">
        </button>
        <button onclick="document.location='{{route('usuaris')}}'" type="button" class="seccions-admin__item">
            <h2>USUARIS</h2>
            <img src="{{url('/img/icon-admin-users.png')}}" alt="usuaris" width="200" height="200">
        </button>
    </div>
</div>

<script>
    function redirectToLandingPage() {
        let localhost = window.location.hostname == '127.0.0.1'

        if (localhost) {
            window.location.href = 'http://127.0.0.1:5501/FrontEnd/'
        } else {
            window.location.href = '../../FrontEnd'
        }
    }
</script>
@endsection