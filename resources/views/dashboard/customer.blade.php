<style>
	ul.profile-links li {
    display: inline;
    padding: 20px;
}
</style>
@extends('layouts.app')
@section('content')

<div class="container">
	<div class='col-md-12' style="display:inline-block">
		<ul class="profile-links" style="">
		    <li><a href="/portfolio">Portfolio</a></li>
			<li><a href="/dashboard">Market</a></li>
			<li><a href="#">Leaderboard</a></li>
			<li><a href="#">Profile</a></li>
		</ul>
	</div>	
    <div class="row justify-content-center">
        <div class="col-lg-12">
        	<div class="panel panel-default">
            <div class="panel-heading"><h3>Market</h3></div>
            <div class="panel-body">
				<table class="table table-condensed" style="border-collapse:collapse;">

				    <thead>
				        <tr>
				        	<th>Title</th>
				            <th>Current Price</th>
				            <th>Change in last 24h</th>
				            <th>Market cap</th>
				            <th>Available supply</th>
				            <th>Total supply</th>
				            <th>Actions</th>
				        </tr>
				    </thead>

				    <tbody>
				    	@forelse($coins as $coin)
						<tr>
				            <td>{{$coin->name}} ({{$coin->symbol}})</td>
				            <td>${{$coin->price_usd}}</td>
				            <td>{{$coin->percent_change_24h}}%</td>
				            <td>${{$coin->market_cap_usd}}</td>
				            <td>{{$coin->available_supply}} {{$coin->symbol}}</td>
				          	<td>{{$coin->total_supply}} {{$coin->symbol}}</td>
				          	<td><a href="{{url('/order', ['currency' => $coin->id,'type'=>'buy'])}}" class="btn btn-success">Buy</a></td>
				        </tr>
						@empty
						@endforelse
				    </tbody>
				</table>
            </div>
        
        </div> 
        
      </div>
    </div>
</div>
@endsection
