<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@section('content')
    <div class="login-container">
        <div class="login-card">
            <h2 class="login-title">Connexion</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn-login btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
@endsection
