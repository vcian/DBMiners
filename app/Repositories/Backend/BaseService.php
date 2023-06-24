<?php

namespace App\Repositories\Backend;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 * Class BaseService
 * @package App\Services
 */
abstract class BaseService
{
    /**
     * Boolean status code
     */
    const STATUS_ZERO = 0;
    const STATUS_ONE = 1;
    const STATUS_TRUE = true;
    const STATUS_FALSE = false;
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PUBLISHED = 'published';
    const STATUS_UNPUBLISHED = 'unpublished';
    const STATUS_DELETE = 'delete';

    /**
     * HTTP status code
     */
    const HTTP_STATUS_CODE_200 = 200; // 200: OK. The standard success code and default option.
    const HTTP_STATUS_CODE_201 = 201; // 201: Object created. Useful for the store actions.
    const HTTP_STATUS_CODE_204 = 204; // 204: No content. When an action was executed successfully, but there is no content to return.
    const HTTP_STATUS_CODE_206 = 206; // 206: Partial content. Useful when you have to return a paginated list of resources.
    const HTTP_STATUS_CODE_400 = 400; // 400: Bad request. The standard option for requests that fail to pass validation.
    const HTTP_STATUS_CODE_401 = 401; // 401: Unauthorized. The user needs to be authenticated.
    const HTTP_STATUS_CODE_403 = 403; // 403: Forbidden. The user is authenticated, but does not have the permissions to perform an action.
    const HTTP_STATUS_CODE_422 = 422; // 403: Forbidden. The user is authenticated, but does not have the permissions to perform an action.
    const HTTP_STATUS_CODE_404 = 404; // 403: Forbidden. The user is authenticated, but does not have the permissions to perform an action.
    const HTTP_STATUS_CODE_500 = 500; // 404: Not found. This will be returned automatically by Laravel when the resource is not found.
    const HTTP_STATUS_CODE_503 = 503; // 500: Internal server error. Ideally you're not going to be explicitly returning this, but if something unexpected breaks, this is what your user is going to receive.


    /**
     * The repository model.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The query builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $query;

    /**
     * Alias for the query limit.
     *
     * @var int
     */
    protected $take;

    /**
     * Array of related models to eager load.
     *
     * @var array
     */
    protected $with = [];

    /**
     * Array of one or more where clause parameters.
     *
     * @var array
     */
    protected $wheres = [];

    /**
     * Array of one or more where in clause parameters.
     *
     * @var array
     */
    protected $whereIns = [];

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [];

    /**
     * Array of scope methods to call on the model.
     *
     * @var array
     */
    protected $scopes = [];

    /**
     * Get all records
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->query()->get();
    }

    /**
     * Get Paginated
     *
     * @param $per_page
     * @param string $active
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getPaginated($per_page, $active = '', $order_by = 'id', $sort = 'asc')
    {
        if ($active) {
            return $this->query()->where('status', $active)
                ->orderBy($order_by, $sort)
                ->paginate($per_page);
        } else {
            return $this->query()->orderBy($order_by, $sort)
                ->paginate($per_page);
        }
    }

    /**
     * Get count of over all entries
     *
     * @return mixed
     */
    public function getCount()
    {
        return $this->query()->count();
    }

    /**
     * Find specific record by it's id
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->query()->find($id);
    }

    /**
     * Create a blank object to pursue with further conditions
     *
     * @return mixed
     */
    public function query()
    {
        return call_user_func(static::MODEL . '::query');
    }

    /**
     * Convert all records to array format
     *
     * @param $request
     * @return mixed
     */
    public function toArray($request)
    {
        return $request->toArray();
    }

    /**
     * Function to check rules for request parameters.
     *
     * @param array $request
     * @param array $rules
     *
     * @return string[]
     */
    protected function validate(array $request, array $rules): array
    {
        $response = [
            'status_code' => '',
            'error' => '',
        ];

        try {
            $validation = Validator::make($request, $rules);

            if ($validation->fails()) {
                $response['status_code'] = 400;
                $response['error'] = $validation->messages()->first();
            }
        } catch (\Exception $ex) {
            Log::error($ex);
        }

        return $response;
    }

    /**
     * Get latest inserted id of table
     *
     * @return int
     */
    public function latestIdForInsertion(): int
    {
        $lastInsertedId = $this->query()->max('id');
        return (!empty($lastInsertedId)) ? $lastInsertedId + 1 : 1;
    }
}
