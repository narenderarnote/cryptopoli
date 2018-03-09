<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Carbon\Carbon;
use App\User;
use App\UserToken;
use App\Additional;
use Illuminate\Http\Request;
use App\Mail\CustomerWelcome;
use Facades\App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    public $data = [];

	public function index()
    {
        return view('dashboard.portfolio');
    }


}
