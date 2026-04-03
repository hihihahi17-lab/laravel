<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminWalletController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'CheckRole:admin']);
    }

    
    public function credit(Request $request, User $user)
    {
        $request->validate([
            'montant' => 'required|integer|min:1',
        ]);

        $user->solde += $request->montant;
        $user->save();

        return response()->json(['solde' => $user->solde]);
    }

    public function debit(Request $request, User $user)
    {
        $request->validate([
            'montant' => 'required|integer|min:1',
        ]);

        if ($user->solde < $request->montant) {
            return response()->json(['error' => 'Solde insuffisant pour ce débit'], 422);
        }

        $user->solde -= $request->montant;
        $user->save();

        return response()->json(['solde' => $user->solde]);
    }
}