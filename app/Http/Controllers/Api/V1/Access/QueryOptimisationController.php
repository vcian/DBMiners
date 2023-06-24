<?php

namespace App\Http\Controllers\Api\V1\Access;

use Exception;
use App\Constant\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\Api\Access\QueryOptimisationRepository;

class QueryOptimisationController extends ApiController
{
    /**
     * @param QueryOptimisationRepository $queryOptimisationRepository
     * QueryOptimisationController constructor.
     *
     */
    public function __construct(Protected QueryOptimisationRepository $queryOptimisationRepository)
    {
    }

    /**
     * Returns optimised query result
     * 
     * @param $request
     * @return mixed
     */
    public function getOptimisedQuery(Request $request) : mixed
    {
        $response = Constant::EMPTY_ARRAY;

        try {
            $response = $this->queryOptimisationRepository->getOptimisedQuery($request->all());
            $this->setStatusCode($response['status']);
            
        } catch (Exception $ex) {
            Log::error($ex);
            $this->setStatusCode(Constant::CODE_403);
        }
        
        return $this->respond($response);
    }
}
