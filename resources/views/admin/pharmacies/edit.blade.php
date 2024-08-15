@extends('layouts.admin')

@section('content')
    <h1>Modifier la Pharmacie</h1>
    <form action="{{ route('pharmacies.update', $pharmacy->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="{{ $pharmacy->name }}" required>
        </div>
        <div>
            <label for="logo">Logo :</label>
            <input type="file" name="logo" id="logo">
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description">{{ $pharmacy->description }}</textarea>
        </div>
        <div>
            <label for="address">Adresse :</label>
            <input type="text" name="address" id="address" value="{{ $pharmacy->address }}">
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
