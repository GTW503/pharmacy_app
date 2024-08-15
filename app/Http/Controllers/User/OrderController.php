<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('user.checkout', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);
        $total_price = array_sum(array_column($cart, 'price'));

        $order = Order::create([
            'user_id' => Auth::id(),
            'pharmacy_id' => 1, // Ceci devrait être dynamique
            'total_price' => $total_price,
            'status' => 'pending',
        ]);

        // Logique de paiement ici

        session()->forget('cart');
        return redirect()->route('user.home')->with('success', 'Commande passée avec succès !');
    }
}
