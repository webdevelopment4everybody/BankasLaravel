@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Istrinimas</div>
        <div class="card-body">
            @foreach ($accounts as $account)
            Prideti pinigu:<br><br>
            <a href="{{route('account.prideti',[$account])}}">{{$account->firstname}} {{$account->lastname}} {{$account->amount}}</a><br><br>
            Atimti pinigu:<br><br>
            <a href="{{route('account.atimti',[$account])}}">{{$account->firstname}} {{$account->lastname}} {{$account->amount}}</a><br>
            <br>
            <form method="POST" action="{{route('account.destroy', [$account])}}">
            @csrf
            <button type="submit">DELETE</button>
            </form>
            @endforeach
            <br>
        </div>
        </div>
    </div>
</div>
</div>
@endsection
