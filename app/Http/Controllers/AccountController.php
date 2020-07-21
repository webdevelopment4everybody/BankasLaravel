<?php

namespace App\Http\Controllers;
use App\Account;
use Illuminate\Http\Request;
use Validator;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $validator = Validator::make($request->all(),
        [
            'firstname' => ['required', 'min:3', 'max:64'],
            'lastname' => ['required', 'min:3', 'max:64'],
            'asmensKodas' => ['required', 'min:11', 'max:11'],
        ],
            [
                'firstname.min' => 'Vardas toks buti negali',
                'lastname.min' => 'Pavarde tokia buti negali',
                'asmensKodas.min' => 'Netinkamai ivestas asmens kodas'
                ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
       
        $account = new Account;
        $account->firstname = $request->name;
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
