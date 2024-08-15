<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gérer la connexion
    public function login(Request $request)
    {
        // Valider les données du formulaire de connexion
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tenter de connecter l'utilisateur avec les informations fournies
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Rediriger en fonction du rôle de l'utilisateur
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        // Si la connexion échoue, rediriger vers la page de connexion avec une erreur
        return redirect()->back()->withErrors('Identifiants incorrects.');
    }

    // Gérer la déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // Afficher le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Gérer l'inscription
    public function register(Request $request)
    {
        // Valider les données du formulaire d'inscription
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Créer un nouvel utilisateur avec les données fournies
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user', // Par défaut, le rôle est "user"
        ]);

        // Rediriger l'utilisateur vers la page de connexion
        return redirect()->route('login');
    }
}
