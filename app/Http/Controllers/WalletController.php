<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

   
    public function balance()
    {
        return response()->json(['solde' => auth()->user()->solde]);
    }

    
    public function spend(Request $request)
    {
        $request->validate([
            'montant' => 'required|integer|min:10',
        ]);

        $user = auth()->user();
        $montant = $request->montant;

        if ($user->solde < $montant) {
            return response()->json(['error' => 'Solde insuffisant'], 422);
        }

        $user->solde -= $montant;
        $user->save();

        return response()->json(['solde' => $user->solde]);
    }
}
