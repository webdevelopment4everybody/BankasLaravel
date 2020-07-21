
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            {{-- <div class="card-header">BANKAS.Nuskaiciuoti lėšas</div> --}}
               <div class="card-body">
                  <h1>BANKAS.Nuskaičiuoti lėšas</h1>
   {{$account->firstname}}
   {{$account->lastname}}<br><br>
   Sąskaitos likutis: {{$account->amount}} eurai(-ų).
   
   <form method="GET" action="{{route('account.atimti',[$account->id])}}">
   Kiek nuskaičiuoti:
   <input type="text" name="amount" >
   <input type="hidden" name="id" value="{{$account->id}}">
   @csrf
   <button style="width:100px;
   background-color: #2BA1F0;
   color: white;
   padding: 5px 8px;
   margin: 8px 0;
   border: none;
   border-radius: 2px;
   cursor: pointer;"type="submit"name="atimti">Nuskaičiuoti</button>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection


