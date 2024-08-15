@extends('layouts.admin')

@section('title', 'Liste des Pharmacies')

@section('content')
    <h1>Liste des Pharmacies</h1>
    <a href="{{ route('pharmacies.create') }}" class="btn btn-success mb-3">Ajouter une Pharmacie</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Logo</th>
                <th scope="col">Nom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pharmacies as $pharmacy)
                <tr>
                    <td>
                        @if($pharmacy->logo)
                            <img src="{{ asset('storage/' . $pharmacy->logo) }}" alt="{{ $pharmacy->name }}" width="50">
                        @else
                            <span>Pas de logo</span>
                        @endif
                    </td>
                    <td>{{ $pharmacy->name }}</td>
                    <td>{{ $pharmacy->address }}</td>
                    <td>
                        <a href="{{ route('pharmacies.edit', $pharmacy->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <form action="{{ route('pharmacies.destroy', $pharmacy->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
