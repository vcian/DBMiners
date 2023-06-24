<?php

namespace App\Http\Controllers\Backend\QueryLogs;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;
use OpenAI;

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
            Session::put('isChat', true);
            
            return view('backend.chat.index');
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }

    public function callOpenAIChatAPI(Request $request)
    {
        if (Session::has('dbSchema')) {
            $schema = Session::get('dbSchema');
        } else {
            $schema = $request->schema;
        }
        $userText = $request->userText;
        $language = $request->language;
        $apiUrl = 'https://api.openai.com/v1/chat/completions';
        $apiKey = config('openai.api_key');
        $client = new Client();
        $response = $client->post($apiUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a MySql database Engineer: <br>' . $schema],
                    ['role' => 'user', 'content' => 'Generate ' . $language . ' query without explanation: ' . $userText],
                ],
                'max_tokens' => 600,
                "temperature" => 0.5,
                "top_p" => 1,
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);

        $result = $responseData['choices'][0]['message']['content'];

        if (Session::has('dbSchema')) {
            $config = Session::get('dynamic_data');
            Config::set('database.connections.dynamic', $config);
            Config::set('database.default', 'dynamic');

            $resultData = DB::connection('dynamic')->select($result);

            $dbResponse = $client->post($apiUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $apiKey,
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are a Front end Engineer: '],
                        ['role' => 'user', 'content' => 'Convert data in table html with inline css with white border and padding without any other explanation: ' . json_encode($resultData)],
                    ],
                    'max_tokens' => 600,
                    "temperature" => 0.7,
                    "top_p" => 1,
                ],
            ]);
            $dbResponseData = json_decode($dbResponse->getBody(), true);

            $dbResult = $dbResponseData['choices'][0]['message']['content'];

            return response()->json($dbResult);
        }

        return response()->json($result);
    }

    public function validateSchema(Request $request)
    {
        $request->validate([
            'schema' => [
                'required',
                Rule::custom(function ($value, $attribute) {
                    // Convert the textarea value to an array of SQL statements
                    $statements = array_filter(array_map('trim', explode(';', $value)));
    
                    // Validate each SQL statement in the array
                    foreach ($statements as $statement) {
                        // Validate the SQL statement using the `Schema` facade
                        if (!Schema::hasValidGrammar($statement)) {
                            return false;
                        }
                    }
    
                    return true;
                })
            ]
        ]);
    }
}