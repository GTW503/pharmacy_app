@extends('layouts.user')

@section('content')
    <h1>Pharmacies Disponibles</h1>
    <ul>
        @foreach($pharmacies as $pharmacy)
            <li><a href="{{ route('pharmacy.show', $pharmacy) }}">{{ $pharmacy->name }}</a></li>
        @endforeach
    </ul>
@endsection
