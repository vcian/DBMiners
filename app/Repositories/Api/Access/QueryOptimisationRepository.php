<?php

namespace App\Repositories\Api\Access;

use Exception;
use App\Constant\Constant;
use Illuminate\Support\Facades\Log;
use App\Repositories\Core\Repository;

class QueryOptimisationRepository extends Repository
{
    /**
     * QueryOptimisationRepository constructor.
     *
     */
    public function __construct()
    {
    }

    /**
     * Returns optimised query result
     * 
     * @param $data
     * @return array
     */
    public function getOptimisedQuery(array $data) : array
    {
        $response = Constant::EMPTY_ARRAY;

        try {
            $data = [
                'model' => Constant::AI_MODEL,
                'prompt' => Constant::AI_PROMPT.$data['query'],
                'temperature' => Constant::AI_TEMPERATURE,
                'max_tokens' => Constant::AI_MAX_TOKENS,
                'top_p' => Constant::AI_TOP_P,
                'frequency_penalty' => Constant::AI_FREQUENCY_PENALTY,
                'presence_penalty' => Constant::AI_PRESENCE_PENALTY
            ]; 
            $responseData = apiCall('post', 'completions', $data) ?? Constant::EMPTY_ARRAY;
            
            if ($responseData) {
                $response['data'] = $responseData;
                $response['status'] = Constant::CODE_200;
            } else {
                $response['data'] = Constant::EMPTY_ARRAY;
                $response['status'] = Constant::CODE_401;
            }

        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = trans('auth.something_went_wrong');
            $response['status'] = Constant::CODE_403;
        }

        return $response;
    }
}

