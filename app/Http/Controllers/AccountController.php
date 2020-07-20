<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();
        return view('account.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account;
        $account->firstname= $request->name;
        $account->lastname = $request->lastname;
        $account->asmensKodas = $request->asmensKodas;
        $account->saskNr = $request->saskNr;
        $account->amount = $request->amount;
        $account->save();
        return redirect()->route('account.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function prideti(Request $request, Account $account)
    {
        $account->amount+=$request->amount;
        $account->save();
        // return redirect()->route('account.index');
        return view('account.prideti', ['account' => $account]);
        // return redirect()->route('account.prideti', ['account'=> $account]);
    }

    public function atimti(Request $request, Account $account)
    {
        $account->amount-=$request->amount;
        $account->save();
        // return redirect()->route('account.index');
        return view('account.atimti', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('account.index');
    }
}
