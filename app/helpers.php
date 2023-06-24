<?php

use GuzzleHttp\Client;
use App\Constant\Constant;
use Illuminate\Support\Facades\Auth;

if (!function_exists('loggedInUser')) {
    /**
     * @return mixed
     *
     * Getting logged in user
     */
    function loggedInUser()
    {
        return Auth::user();
    }
}

if (!function_exists('includeRouteFiles')) {

    /**
     * @param $folder
     *
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     */
    function includeRouteFiles($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }
                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('hideUserToken')) {
    /**
     * @param $string
     * @return string
     *
     * Hide the user tokens
     *
     */
    function hideUserToken($token)
    {
        $append = str_replace(substr($token,Constant::STATUS_FIVE), str_repeat('*', strlen($token)-Constant::STATUS_ONE), $token);
        $last = substr($token,-Constant::STATUS_FIVE);
        $token = $append.$last;
        return $token;
    }
}

if (!function_exists('apiCall')) {
    /**
     * @return mixed
     *
     * Get API response
     * 
     * @param $method
     * @param $endPoint
     * @param $parameter
     * @param $headers
     */
    function apiCall($method, $endPoint, $parameter = Constant::EMPTY_ARRAY, $headers = ['Content-Type' => 'application/json'])
    {
        $url = config('config-variables.openai_api_url') . $endPoint;
        $client = new Client();

        $headers['Authorization'] = 'Bearer ' . config('config-variables.openai_api_key');

        if ($method == 'post') {
            $response = $client->post($url, ['json' => $parameter, 'headers' => $headers]);
        } else if ($method == 'delete') {
            $response = $client->delete($url, ['json' => $parameter, 'headers' => $headers]);
        } else if ($method == 'get') {
            $response = $client->request($method, $url, ['headers' => [
                'Authorization' => 'Bearer ' . config('config-variables.openai_api_key'),
            ]]);
        } else {
            $response = $client->request($method, $url, ['headers' => $headers]);
        }
        $statusCode = $response->getStatusCode();
        $body = json_decode($response->getBody()->getContents());

        if ($statusCode == Constant::CODE_200) {
            return $body;
        } else {
            return Constant::EMPTY_ARRAY;
        }
    }
}
