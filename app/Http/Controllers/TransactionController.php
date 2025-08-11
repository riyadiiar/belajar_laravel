<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('transaction.index', compact('transactions'));
    }

    public function create()
    {
        return view('transaction.create');
    }

    public function store(Request $request)
    {
        $transactions = new Transaction();
        $transactions->name = $request->input('name');
        $transactions->tempat = $request->input('tempat');
        $transactions->transaction_id = $request->input('transaction_id');
        $transactions->amount = $request->input('amount');
        $transactions->save();

        return redirect()->route('DaftarTransaksi');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->name = $request->input('name');
        $transaction->tempat = $request->input('tempat');
        $transaction->transaction_id = $request->input('transaction_id');
        $transaction->amount = $request->input('amount');
        // dd($transaction);
        $transaction->save();

        return redirect()->route('DaftarTransaksi');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);

        // Set status_transaksi to 9 before soft deleting
        $transaction->status_transaksi = 9;
        $transaction->save();
        
        $transaction->delete(); // This will soft delete the record

        return redirect()->route('DaftarTransaksi');
    }

    // Show only soft deleted records
    public function trashed()
    {
        $transactions = Transaction::onlyTrashed()->get();
        return view('transaction.trashed', compact('transactions'));
    }

    // Restore soft deleted record
    public function restore($id)
    {
        $transaction = Transaction::onlyTrashed()->findOrFail($id);
        $transaction->status_transaksi = 1; // Reset status_transaksi to active
        $transaction->save();
        $transaction->restore();
        
        return redirect()->route('DaftarTransaksi');
    }

    // Permanently delete record
    public function forceDelete($id)
    {
        $transaction = Transaction::onlyTrashed()->findOrFail($id);
        $transaction->forceDelete();
        
        return redirect()->route('transactions.trashed');
    }
}
