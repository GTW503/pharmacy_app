@extends('layouts.admin')

@section('content')
    <h1>Tableau de Bord Admin</h1>
    <p>Bienvenue, {{ auth()->user()->name }}!</p>
@endsection
