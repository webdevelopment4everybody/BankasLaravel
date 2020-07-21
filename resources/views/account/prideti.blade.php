
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">BANKAS.Pridėti lėšas</div>
               <div class="card-body">
                  {{$account->firstname}}
                  {{$account->lastname}}<br><br>
                  Saskaitos likutis: {{$account->amount}} eurai(-u).
               <form method="GET" action="{{route('account.prideti',[$account->id])}}">
                  <div class="form-group">
                     <label>Kiek prideti: </label>
                     <input type="text" name="amount"  class="form-control">
                     <input type="hidden" name="id" value="{{$account->id}}">
                     <small class="form-text text-muted">Kiek prideti pinigu prie saskaitos</small>
                  </div> 
                  @csrf
                  <button type="submit">Prideti</button>
                  <i class="fas fa-clock"></i>
               </form>
               </div>
         </div>
       </div>
   </div>
</div>
@endsection