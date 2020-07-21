@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
        <div class="card-body">
          <h1>BANKAS.<br> Klientų sąrašas.</h1>
          <table class="table"style="overflow-x:auto;">
          <tr>
          <th>Vardas</th>
          <th>Pavardė</th>
          <th>Asmens kodas</th>
          <th>Sąskaitos numeris</th>
          <th>Likutis</th>
          <th>Pridėti pinigų</th>
          <th>Nuskaičiuoti pinigų</th>
          <th>Ištrinti vartotoją</th>
          </tr>
            @foreach ($accounts as $account)
            <tr>
              <td>{{$account->firstname}} </td>
              <td>{{$account->lastname}}</td>
              <td>{{$account->asmensKodas}}</td>
              <td>{{$account->saskNr}}</td>
              <td>{{$account->amount}}</td>
              <td><a href="{{route('account.prideti',[$account])}}">Pridėti pinigų</a></td>
              <td><a href="{{route('account.atimti',[$account])}}">Nuskaičiuoti pinigų</a></td>
              <td><form method="POST" action="{{route('account.destroy', [$account])}}">
                @csrf
                <button style="width:100px;
                background-color: #2BA1F0;
                color: white;
                padding: 5px 8px;
                margin: 8px 0;
                border: none;
                border-radius: 2px;
                cursor: pointer;"type="submit">Ištrinti</button>
              </form></td>
            </tr>
            @endforeach
            <br>
        </div>
      </div>
    </div>
</div>
</div>
@endsection
