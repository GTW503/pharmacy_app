<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

@section('content')
    <div class="register-container">
        <div class="register-card">
            <h2 class="register-title">Inscription</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe :</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn-register">S'inscrire</button>
            </form>
        </div>
    </div>
@endsection
