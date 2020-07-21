
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            {{-- <div class="card-header">BANKAS.Pridėti lėšas</div> --}}
               <div class="card-body">
                  <h1>BANKAS.Pridėti lėšas</h1>
                  {{$account->firstname}}
                  {{$account->lastname}}<br><br>
                  Sąskaitos likutis: {{$account->amount}} eurai(-ų).
               <form method="GET" action="{{route('account.prideti',[$account->id])}}">
                  <div class="form-group">
                     <label>Kiek pridėti: </label>
                     <input type="text" name="amount"  class="form-control">
                     <input type="hidden" name="id" value="{{$account->id}}">
                     <small class="form-text text-muted">Kiek pridėti pinigų prie sąskaitos</small>
                  </div> 
                  @csrf
                  <button style="width:100px;
                  background-color: #2BA1F0;
                  color: white;
                  padding: 5px 8px;
                  margin: 8px 0;
                  border: none;
                  border-radius: 2px;
                  cursor: pointer;"type="submit" name="prideti">Pridėti</button>
                  <i class="fas fa-clock"></i>
               </form>
               </div>
         </div>
       </div>
   </div>
</div>
@endsection