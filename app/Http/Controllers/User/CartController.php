<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('user.cart', compact('cart'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Vous devez vous connecter pour passer une commande.');
        }

        $cart = session()->get('cart', []);
        $cart[$request->id] = [
            "name" => $request->name,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "photo" => $request->photo
        ];

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier !');
    }
}
