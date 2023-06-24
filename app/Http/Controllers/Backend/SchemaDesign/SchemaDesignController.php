<?php

namespace App\Http\Controllers\Backend\SchemaDesign;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SchemaDesignController extends Controller
{
    public function index()
    {
        return view('backend.schema-design.chat');
    }

    public function chat(Request $request)
    {   
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
                    ['role' => 'system', 'content' => 'You are a MySql database schema Engineer.'],
                    ['role' => 'user', 'content' => 'Generate MySql schema without any explaination: '.$request->prompt],
                ],
            ],
        ]);
        $responseData = json_decode($response->getBody(), true);
        $result = $responseData['choices'][0]['message']['content'];

        return response()->json($result);
    }
}
