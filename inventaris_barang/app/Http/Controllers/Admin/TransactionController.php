<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('item')->latest()->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $items = Item::all();
        return view('admin.transactions.create', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:in,out',
            'notes' => 'nullable'
        ]);

        $transaction = Transaction::create($validated);

        // Update item quantity
        $item = Item::find($request->item_id);
        if ($request->type == 'in') {
            $item->quantity += $request->quantity;
        } else {
            $item->quantity -= $request->quantity;
        }
        $item->save();

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        return view('admin.transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $items = Item::all();
        return view('admin.transactions.edit', compact('transaction', 'items'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:in,out',
            'notes' => 'nullable'
        ]);

        // Revert old transaction
        $oldItem = $transaction->item;
        if ($transaction->type == 'in') {
            $oldItem->quantity -= $transaction->quantity;
        } else {
            $oldItem->quantity += $transaction->quantity;
        }
        $oldItem->save();

        // Update transaction
        $transaction->update($validated);

        // Apply new transaction
        $newItem = Item::find($request->item_id);
        if ($request->type == 'in') {
            $newItem->quantity += $request->quantity;
        } else {
            $newItem->quantity -= $request->quantity;
        }
        $newItem->save();

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        // Revert transaction
        $item = $transaction->item;
        if ($transaction->type == 'in') {
            $item->quantity -= $transaction->quantity;
        } else {
            $item->quantity += $transaction->quantity;
        }
        $item->save();

        $transaction->delete();
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}