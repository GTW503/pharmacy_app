@extends('layouts.admin')

@section('title', 'Ajouter une Pharmacie')

@section('content')
    <h1>Ajouter une Pharmacie</h1>
    <form action="{{ route('admin.pharmacies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom :</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo :</label>
            <input type="file" name="logo" id="logo" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse :</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
