<?php

namespace App\Http\Controllers;

use PDO;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Vcian\LaravelDBAuditor\Constants\Constant;
use Vcian\LaravelDBAuditor\Services\RuleService;

class HomeController extends Controller
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
            $token = loggedInUser()->tokens->first()
                    ->makeVisible(['token'])->token;
            
            return view('backend.dashboard.index', compact('token'));
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function connectDb()
    {
        return view('connect-db.create');
    }

    /**
     * Create the connection of DB and check the table rules
     * @param Request $request
     * @return array
     */
    public function createConnectionDb(Request $request)
    {
        try {
            DB::purge('mysql'); // Clear any previous dynamic connection
            $config = [
                'driver' => $request->input('connection'), // or any other supported driver
                'host' => $request->input('host'),
                'database' => $request->input('db_name'), // Replace with your actual database name
                'username' => $request->input('db_username'),
                'password' => $request->input('db_password'),
            ];

            DB::connection('mysql')->setPdo(new PDO(
                $config['driver'].':host='.$config['host'].';dbname='.$config['database'],
                $config['username'],
                $config['password']
            ));

            if (DB::connection()->getDatabaseName()) {
                $ruleService = app(RuleService::class);
                $tableStatus = $ruleService->tablesRule();


                return ['status' => Constant::STATUS_TRUE, 'tableStatus' => $tableStatus ];
            }
        } catch (\Exception $e) {
            //throw $th;
            die("Database connection failed: " . $e->getMessage());
        }

    }
}
