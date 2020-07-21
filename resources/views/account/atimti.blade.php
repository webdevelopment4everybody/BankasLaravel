
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">BANKAS.Nuskaiciuoti lėšas</div>
               <div class="card-body">
   {{$account->firstname}}
   {{$account->lastname}}<br><br>
   Saskaitos likutis: {{$account->amount}} eurai(-u).
   
   <form method="GET" action="{{route('account.atimti',[$account->id])}}">
   Kiek nuskaiciuoti:
   <input type="text" name="amount" >
   <input type="hidden" name="id" value="{{$account->id}}">
   @csrf
   <button type="submit">Nuskaiciuoti</button>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection


