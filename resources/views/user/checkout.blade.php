@extends('layouts.user')

@section('content')
    <h1>Passer à la caisse</h1>
    <p>Total: {{ array_sum(array_column(session('cart'), 'price')) }}€</p>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <button type="submit">Payer</button>
    </form>
@endsection
