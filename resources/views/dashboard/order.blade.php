@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  @php $price = ''; 
       $symbol = '';
  @endphp
  @forelse($currency as $curr)
     @php 
          $price  = $curr->price_usd;
          $symbol = $curr->symbol;
     @endphp     
  @empty
  @endforelse
<div class="container">
  <div class='col-md-12' style="display:inline-block"> 
 <form>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group">
        <span class="input-group-addon">MAX</span>
        <input id="quantity" type="text" class="form-control" name="quantity" placeholder="Quantity">
        <span class="input-group-addon">{{$symbol}}</span>
        x {{$price}}
      </div>
    </div> 
    <div class="col-md-6">
      <div class="input-group">
        <input id="amount" type="text" class="form-control" name="amount" placeholder="Amount">
        <span class="input-group-addon">USD</span>
      </div>
    </div>
    </div>
  </form>
 </div>
</div>
@endsection 