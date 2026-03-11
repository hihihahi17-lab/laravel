<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Loancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $loans = Loan::all();

    return response()->json([
        'message' => 'Liste des emprunts',
        'data' => $loans
    ],200);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'borrower_name'=>'required',
        'borrower_email'=>'required|email',
        'book_title'=>'required',
        'borrowed_at'=>'date',
        'due_date'=>'date'
    ]);

    $loan = Loan::create($validated);

    return response()->json([
        'message'=>'Emprunt créé',
        'data'=>$loan
    ],201);
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $loan = Loan::find($id);

    if(!$loan){
        return response()->json([
            'message'=>'Emprunt non trouvé',
            'data'=>null
        ],404);
    }

    return response()->json([
        'message'=>'Emprunt trouvé',
        'data'=>$loan
    ],200);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $loan = Loan::find($id);

    if(!$loan){
        return response()->json([
            'message'=>'Emprunt non trouvé',
            'data'=>null
        ],404);
    }

    $loan->update($request->all());

    return response()->json([
        'message'=>'Emprunt modifié',
        'data'=>$loan
    ],200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $loan = Loan::find($id);

    if(!$loan){
        return response()->json([
            'message'=>'Emprunt non trouvé',
            'data'=>null
        ],404);
    }

    $loan->delete();

    return response()->json([
        'message'=>'Emprunt supprimé',
        'data'=>null
    ],204);
}
    public function returnLoan($id)
{
    $loan = Loan::find($id);

    if(!$loan){
        return response()->json([
            'message'=>'Emprunt non trouvé',
            'data'=>null
        ],404);
    }

    $loan->returned = true;
    $loan->status = 'returned';
    $loan->save();

    return response()->json([
        'message'=>'Livre retourné',
        'data'=>$loan
    ],200);
}
}
