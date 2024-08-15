<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PharmacyController as AdminPharmacyController;
use App\Http\Controllers\Admin\MedicineController as AdminMedicineController;
use App\Http\Controllers\User\PharmacyController as UserPharmacyController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Page d'accueil par défaut
Route::get('/', [UserPharmacyController::class, 'index'])->name('home');

// Route pour afficher les médicaments d'une pharmacie spécifique (accessible à tous)
Route::get('/pharmacy/{id}', [UserPharmacyController::class, 'show'])->name('pharmacy.show');

// Routes pour l'authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Routes pour les utilisateurs (nécessite la connexion)
Route::middleware(['auth'])->group(function () {
    // Route pour afficher le panier
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    
    // Route pour ajouter un produit au panier
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    
    // Routes pour le processus de commande et de paiement
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('checkout.process');
});

// Routes pour l'administration (nécessite la connexion et le rôle admin)
Route::middleware(['auth', 'admin'])->group(function () {
    // Tableau de bord de l'administrateur
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Gestion des pharmacies (CRUD)
    Route::resource('admin/pharmacies', AdminPharmacyController::class);

    // Gestion des médicaments au sein des pharmacies (CRUD)
    Route::resource('admin/pharmacies.medicines', AdminMedicineController::class);
});
