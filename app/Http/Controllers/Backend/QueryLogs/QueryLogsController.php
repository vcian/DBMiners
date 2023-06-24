<?php

namespace App\Http\Controllers\Backend\QueryLogs;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class QueryLogsController extends Controller
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
            return view('backend.query-logs.index');
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }

    /**
     * Open chat view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openChat()
    {
        try {
            return view('backend.chat.index');
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }
}
