<?php

namespace App\Repositories\Api\Access;

use Exception;
use App\Constant\Constant;
use Illuminate\Support\Facades\Log;
use App\Repositories\Core\Repository;
use Illuminate\Support\Facades\DB;
use PDOException;

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
    public function getOptimisedQuery(array $data): array
    {
        $response = Constant::EMPTY_ARRAY;

        try {
            $isValidMysql = $this->validateMysqlQuery($data);

            if (isset($isValidMysql['message']) && $isValidMysql['message'] === '42000') {
                $response['message'] = 'Please write proper mysql query';
                $response['status'] = Constant::CODE_403;
                return $response;
            }

            $convertORM = match ($data['conver_to']) {
                '0' => null,
                '1' => 'in Laravel ORM',
                '2' => 'in Hibernate ORM',
                '3' => 'in SQLAlchemy ORM',
                '4' => 'in Entity Framework ORM',
                '5' => 'in Django ORM',
                '6' => 'in Sequelize ORM',
                '7' => 'in ActiveRecord ORM',
            };
            
            $data = [
                'model' => Constant::AI_MODEL,
                'prompt' => Constant::AI_PROMPT . $data['prompt'] . $convertORM,
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

    public function validateMysqlQuery(array $data): array
    {
        $response = Constant::EMPTY_ARRAY;
        try {
            DB::statement($data['prompt']); 
        } catch (Exception $ex) {
            $response['message'] = trans('auth.something_went_wrong');
            $response['status'] = Constant::CODE_403;
            if ($ex instanceof PDOException) {
                $response['message'] = $ex->getCode();
                $response['status'] = Constant::CODE_403;
            }
        }

        return $response;
    }
}
