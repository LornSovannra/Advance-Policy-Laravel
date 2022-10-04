<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('welcome', compact('transactions'));
    }

    function create(){
        //Policy
        $this->authorize('create', Transaction::class);

        return view('components.transaction.create');
    }

    function show(Transaction $transaction){

        //Policy
        $this->authorize('view', $transaction);

        return view('components.transaction.show', compact('transaction'));
    }

    function save(Request $req, Transaction $transaction){
        //Policy
        $this->authorize('create', $transaction);

        $req->validate([
            'account_name' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);

        $transaction->account_name = $req->account_name;
        $transaction->type = $req->type;
        $transaction->price = $req->price;
        $transaction->save();

        return redirect()->route('transaction.index');
    }

    function edit(Transaction $transaction){

        //Policy
        $this->authorize('update', $transaction);

        return view('components.transaction.edit', compact('transaction'));
    }

    function update(Request $req, Transaction $transaction){
        //Policy
        $this->authorize('update', $transaction);

        $req->validate([
            'account_name' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);

        $transaction->account_name = $req->account_name;
        $transaction->type = $req->type;
        $transaction->price = $req->price;
        $transaction->save();

        return redirect()->route('transaction.index');
    }
}
