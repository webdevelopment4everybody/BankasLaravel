@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-body">
          <h1>BANKAS.<br> Klientų sąrašas.</h1>
          <table class="table">
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
              <td><a href="{{route('account.prideti',[$account])}}">Prideti pinigu</a></td>
              <td><a href="{{route('account.atimti',[$account])}}">Nuskaiciuoti pinigu</a></td>
              <td><form method="POST" action="{{route('account.destroy', [$account])}}">
                @csrf
                <button type="submit">Istrinti</button>
              </form></td>
            </tr>
            @endforeach
            <br>
        </div>
      
    </div>
</div>
</div>
@endsection
