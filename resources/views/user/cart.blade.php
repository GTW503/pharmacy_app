@extends('layouts.user')

@section('content')
    <h1>Votre Panier</h1>

    @if(session('cart'))
        <ul>
            @foreach(session('cart') as $id => $details)
                <li>
                    <img src="{{ asset('storage/' . $details['photo']) }}" alt="{{ $details['name'] }}" width="100">
                    <h3>{{ $details['name'] }}</h3>
                    <p>Prix: {{ $details['price'] }}€</p>
                    <p>Quantité: {{ $details['quantity'] }}</p>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('checkout') }}">Passer à la caisse</a>
    @else
        <p>Votre panier est vide.</p>
    @endif
@endsection
