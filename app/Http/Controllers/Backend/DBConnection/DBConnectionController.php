<?php

namespace App\Http\Controllers\Backend\DBConnection;

use Exception;
use App\Constant\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Vcian\LaravelDBAuditor\Traits\Rules;
use Vcian\LaravelDBAuditor\Services\RuleService;
use App\Repositories\Backend\DBConnection\DBConnectionService;

class DBConnectionController extends Controller
{
    use Rules;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected DBConnectionService $dBConnectionService)
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        try {
            if ($request->chat == 'false') {
                Session::forget('isChat');
                Session::forget('dbSchema');
            }

            if (Session::has('isChat')) {
                return view('backend.chat.index');
            }

            return view('backend.db-connect.create');
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }

    /**
     * Connect database
     * 
     * @param $request
     * @return mixed
     */
    public function connect(Request $request): mixed
    {
        $response = $this->dBConnectionService->connect($request);

        if ($response) {
            return redirect(route('backend.query_logs.chat'))
                ->with('flash_success', __('db_connection.connected_successfully'));
        }

        return redirect()->back()->with('flash_error', __('db_connection.something_went_wrong'));
    }

    /**
     * Upload database
     * 
     * @param $request
     * @return mixed
     */
    public function upload(Request $request): mixed
    {
        $response = Constant::EMPTY_ARRAY;

        try {
            $response = $this->dBConnectionService->upload($request);

            if ($response) {
                return redirect()
                    ->back()
                    ->with('flash_success', __('db_connection.uploaded_successfully'));
            }

        } catch (Exception $ex) {
            Log::error($ex);
        }

        return redirect()->back()->with('flash_error', __('db_connection.something_went_wrong'));
    }
}