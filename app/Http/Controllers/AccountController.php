<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
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
        $accounts = Account::all()->sortBy('lastname');
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
            'name' => ['required', 'min:3', 'max:64'],
            'lastname' => ['required', 'min:3', 'max:64'],
            'asmensKodas' => ['required','min:11', 'max:11'],
        ],
            [
                'name.min' => 'Blogai įvestas vardas',
                'lastname.min' => 'Blogai įvesta pavardė',
                'asmensKodas.min' => 'Asmens kodas neatitinka formato',
                'asmensKodas.max' => 'Asmens kodas neatitinka formato'
                ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        if (Account::where('asmensKodas',$request->asmensKodas)->first()){
            return redirect()->route('account.index')->withErrors('toks asmuo jau yra');
        }else{
       
        $account = new Account;
        $account->firstname = $request->name;
        $account->lastname = $request->lastname;
        $account->asmensKodas = $request->asmensKodas;
        $account->saskNr = $request->saskNr;
        $account->amount = $request->amount;
        $account->save();
        return redirect()->route('account.index')->with('success_message', 'Vartotojas įrašytas');
    }
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
        if(isset($_GET['amount'])){
        $validator = Validator::make($request->all(),
        []
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        if ($request->amount < 0) return redirect()->route('account.index')->withErrors('Negalima pridėti minusinių pinigų.');
        $account->amount+=$request->amount;
        $account->save();
        return redirect()->route('account.index')->with('success_message', 'Pridėta lėšų');
    }else{
        // return redirect()->route('account.index');
        return view('account.prideti', ['account' => $account]);
    }
}

    public function atimti(Request $request, Account $account)
    {
        if(isset($_GET['amount'])){
            $validator = Validator::make($request->all(),
            []
            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
            if ($request->amount < 0) return redirect()->route('account.index')->withErrors('Negalima atimti minusinių pinigų.');
            elseif($request->amount > $account->amount)return redirect()->route('account.index')->withErrors('Sąskaitoje nepakanka lėšų.');
            $account->amount-=$request->amount;
            $account->save();
            // return redirect()->route('account.index');
            return redirect()->route('account.index')->with('success_message', 'Nuskaičiuota lėšų');
        }
        else{
            return view('account.atimti', ['account' => $account]);
        }
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
    public function destroy(Account $account,Request $request)
    {
        $validator = Validator::make($request->all(),
        []
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        if ($account->amount > 0) return redirect()->route('account.index')->withErrors('Negalima trinti šios sąskaitos, nes joje dar yra lėšų.');
        $account->delete();
        // return redirect()->route('account.index');
        return redirect()->route('account.index')->with('success_message', 'Sėkmingai ištrintas');
    }
}
