@extends('layouts.user')

@section('content')
    <h1>Médicaments disponibles chez {{ $pharmacy->name }}</h1>
    <ul>
        @foreach($pharmacy->medicines as $medicine)
            <li>
                <img src="{{ asset('storage/' . $medicine->photo) }}" alt="{{ $medicine->name }}" width="100">
                <h3>{{ $medicine->name }}</h3>
                <p>Catégorie: {{ $medicine->category }}</p>
                <p>Dosage: {{ $medicine->dosage }}</p>
                <p>Prix: {{ $medicine->price }}€</p>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $medicine->id }}">
                    <input type="hidden" name="name" value="{{ $medicine->name }}">
                    <input type="hidden" name="price" value="{{ $medicine->price }}">
                    <input type="hidden" name="photo" value="{{ $medicine->photo }}">
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit">Ajouter au Panier</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
