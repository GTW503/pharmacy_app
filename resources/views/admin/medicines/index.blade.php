@extends('layouts.admin')

@section('content')
    <h1>Médicaments de {{ $pharmacy->name }}</h1>
    <a href="{{ route('admin.medicines.create', $pharmacy) }}">Ajouter un Médicament</a>
    <ul>
        @foreach($medicines as $medicine)
            <li>{{ $medicine->name }} - <a href="{{ route('admin.medicines.edit', [$pharmacy, $medicine]) }}">Modifier</a></li>
        @endforeach
    </ul>
@endsection
