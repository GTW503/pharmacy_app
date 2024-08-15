@extends('layouts.admin')

@section('content')
    <h1>Ajouter un Médicament</h1>
    <form action="{{ route('admin.medicines.store', $pharmacy) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Nom du médicament">
        <input type="text" name="category" placeholder="Catégorie">
        <input type="text" name="dosage" placeholder="Dosage">
        <input type="number" step="0.01" name="price" placeholder="Prix">
        <input type="file" name="photo">
        <button type="submit">Ajouter</button>
    </form>
@endsection
