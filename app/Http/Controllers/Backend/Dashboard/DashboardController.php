<?php

namespace App\Http\Controllers\Backend\Dashboard;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $token = loggedInUser()->tokens->first()->makeVisible(['token'])->token;
            
            return view('backend.dashboard.index', compact('token'));
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }
}
