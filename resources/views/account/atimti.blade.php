<h1>BANKAS.Nuimti lėšas.</h1>
<div>
   {{$account->firstname}}
   {{$account->lastname}}
   
   <form method="GET" action="{{route('account.atimti',[$account->id])}}">
   Kiek nuskaiciuoti:
   <input type="text" name="amount" >
   <input type="hidden" name="id" value="{{$account->id}}">
   @csrf
   <button type="submit">Nuskaiciuoti</button>
</form>
</div>

