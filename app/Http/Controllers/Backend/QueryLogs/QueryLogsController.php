<?php

namespace App\Http\Controllers\Backend\QueryLogs;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
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
            return view('backend.chat.index');
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }

    public function callOpenAIChatAPI(Request $request)
    {
        $schema = $request->schema;
        $userText = $request->userText;
        $language = $request->language;
        $apiUrl = 'https://api.openai.com/v1/chat/completions';
        $apiKey = config('services.open_ai.secret');
        $client = new Client();

        $response = $client->post($apiUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a MySql database Engineer: <br>' . $schema ],
                    ['role' => 'user', 'content' => 'Generate ' . $language . ' query without explanation: ' . $userText],
                ],
                'max_tokens' => 600,
                "temperature" => 0.7,
                "top_p" => 1,
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);

        $result = $responseData['choices'][0]['message']['content'];

        return response()->json($result);
    }
}