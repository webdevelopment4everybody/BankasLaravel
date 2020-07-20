<?php

$saskNr = 'LT';
    for($i = 0; $i<18; $i++){
        $randNr = rand(0,9);
        $saskNr .= $randNr;
    }
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bankas.Naujas klientas</div>
                <div class="card-body">
                    <form method="POST" action="{{route('account.store')}}">
                        <div class="form-group">
                            <label>Vardas</label>
                            <input type="text" name="name"  class="form-control">
                            <small class="form-text text-muted">Vardas</small>
                        </div> 
                        <div class="form-group">
                            <label>Pavarde</label>
                            <input type="text" name="lastname"  class="form-control">
                            <small class="form-text text-muted">Pavarde</small>
                        </div>
                        <div class="form-group">
                            <label>Asmens kodas</label>
                            <input type="text" name="asmensKodas"  class="form-control">
                            <small class="form-text text-muted">Asmens kodas</small>
                        </div>
                        <div class="form-group">
                            <label>Saskaitos numeris</label>
                            <input type="text" name="saskNr" value="{{$saskNr}}" class="form-control">
                            <small class="form-text text-muted">Saskaitos numeris </small>
                        </div>

                        <input type="hidden" name ="amount" value="0">
                        @csrf
                        <button type="submit">ADD</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection