<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class DashboardController extends Controller
{
    public $data = [];

    public function index()
    {
    	if(auth()->user()->hasRole('customer')) 
    	{
            
    		return $this->customerDashboard();
    	}
    	else
    	{
            return $this->adminDashboard();
    		//return view('dashboard.employer');
    	}
    	
    }


    public function customerDashboard()
    {
        /*$client = new Client(); //GuzzleHttp\Client
        $body = $client->request('GET','https://api.coinmarketcap.com/v1/ticker/', [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->getBody();*/

    //$contents = (string) $body;
        $contents =  '[ {
        "id": "bitcoin", 
        "name": "Bitcoin", 
        "symbol": "BTC", 
        "rank": "1", 
        "price_usd": "11004.3", 
        "price_btc": "1.0", 
        "24h_volume_usd": "6544640000.0", 
        "market_cap_usd": "186011185050", 
        "available_supply": "16903500.0", 
        "total_supply": "16903500.0", 
        "max_supply": "21000000.0", 
        "percent_change_1h": "-0.45", 
        "percent_change_24h": "-4.56", 
        "percent_change_7d": "2.61", 
        "last_updated": "1520353766"
    }, 
    {
        "id": "ethereum", 
        "name": "Ethereum", 
        "symbol": "ETH", 
        "rank": "2", 
        "price_usd": "830.607", 
        "price_btc": "0.0758627", 
        "24h_volume_usd": "1921530000.0", 
        "market_cap_usd": "81417227064.0", 
        "available_supply": "98021359.0", 
        "total_supply": "98021359.0", 
        "max_supply": null, 
        "percent_change_1h": "-0.18", 
        "percent_change_24h": "-3.45", 
        "percent_change_7d": "-5.71", 
        "last_updated": "1520353752"
    }
    ]'; 
    $this->data['coins'] = json_decode($contents);

        return view('dashboard.customer', $this->data);
    }

    public function adminDashboard()
    {

        return view('dashboard.admin', $this->data);
    }
    public function portfolio()
    {
        return view('dashboard.portfolio');
    }
    public function order(Request $request,$currency,$type)
    {
        $client = new Client(); //GuzzleHttp\Client
        $body = $client->request('GET','https://api.coinmarketcap.com/v1/ticker/'.$currency, [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->getBody();

        $contents = (string) $body;
       
        $this->data['currency'] = json_decode($contents);
        return view('dashboard.order',$this->data);
    }
}

