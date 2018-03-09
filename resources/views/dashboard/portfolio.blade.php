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
			<li><a href="/dashboard/">Market</a></li>
			<li><a href="#">Leaderboard</a></li>
			<li><a href="#">Profile</a></li>
		</ul>
	</div>	
    <div class="row justify-content-center">
        <div class="col-lg-12">
        	<div class="panel panel-default">
            <div class="panel-heading"><h3>Portfolio</h3></div><hr>
            <div class="panel-body">
            	<h2>Portfolio value:</h2>
            	<h3>Unspent:$12000</h3> 
				<table class="table table-condensed" style="border-collapse:collapse;">

				    <thead>
				        <tr>
				        	<th>Title</th>
				            <th>Quantity</th>
				            <th>Current Value</th>
				            <th>Total Paid/Sold</th>
				            <th>Change</th>
				            <th>Actions</th>
				        </tr>
				    </thead>

				    <tbody>
						<tr>
				            <td>Basic Attention Token (BAT)</td>
				            <td>21,578.40 BAT</td>
				            <td>$7,278.72 $0.34/BAT</td>
				            <td>$8,209.64 $0</td>
				            <td> 11.34% $-930.92</td>
				          	<td><button class="btn btn-success">Buy</button>
				          		<button class="btn btn-danger">Sell</button>
				          	</td>
				        </tr>
				    </tbody>
				</table>
            </div>
        
        </div> 
        
      </div>
    </div>
</div>
@endsection
