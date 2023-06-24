<?php

namespace App\Http\Controllers\Backend\Standards;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Vcian\LaravelDBAuditor\Traits\Rules;

class StandardsController extends Controller
{
    use Rules;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        try {
            $tables = $request['tables'];

            return view('backend.standards.index', compact('tables'));
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }
}