<?php

namespace App\Http\Controllers\Backend\QueryOptimization;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class QueryOptimizationController extends Controller
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
            return view('backend.query-optimization.index');
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }
}
