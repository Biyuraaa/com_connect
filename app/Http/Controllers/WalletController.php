<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->wallet) {
            return redirect()->route('wallets.create');
        }
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        $transactions = Transaction::where('wallet_id', $wallet->id)->get();
        return view('pages.auth.wallets.index', compact('wallet', 'transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->wallet) {
            return redirect()->route('wallets.index')->with('error', 'You already have a wallet.');
        } else {
            return view('pages.auth.wallets.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWalletRequest $request)
    {
        $request->validated();

        Wallet::create([
            'user_id' => $request->user_id,
            'balance' => $request->balance
        ]);

        return redirect()->route('wallets.index')->with('success', 'Wallet created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        //
    }

    public function deposit()
    {
        return view('pages.auth.wallets.deposit');
    }

    public function storeDeposit(Request $request)
    {
        $request->validate([
            'balance' => 'required|numeric|min:1',
            'wallet_id' => 'required|exists:wallets,id'
        ]);

        $wallet = Wallet::find(Auth::user()->wallet->id);
        $wallet->balance += $request->balance;
        $wallet->save();

        Transaction::create([
            'wallet_id' => $wallet->id,
            'amount' => $request->balance,
            'type' => 'deposit'
        ]);

        return redirect()->route('wallets.index')->with('success', 'Wallet balance updated successfully.');
    }
}
