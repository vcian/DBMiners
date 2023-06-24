<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response as IlluminateResponse;


class ApiController extends Controller
{
    /**
     * Boolean status code
     */
    const STATUS_ZERO = 0;
    const STATUS_ONE = 1;
    const STATUS_TRUE = true;
    const STATUS_FALSE = false;

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
     * default status code.
     *
     * @var int
     */
    protected $statusCode = 200;

    /**
     * get the status code.
     *
     * @return statuscode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * set the status code.
     *
     * @param [type] $statusCode [description]
     *
     * @return statuscode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Respond.
     *
     * @param array $data
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * respond with pagincation.
     *
     * @param Paginator $items
     * @param array     $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithPagination($items, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count'  => $items->total(),
                'total_pages'  => ceil($items->total() / $items->perPage()),
                'current_page' => $items->currentPage(),
                'limit'        => $items->perPage(),
            ],
        ]);

        return $this->respond($data);
    }

    /**
     * Respond Created.
     *
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondCreated($data)
    {
        return $this->setStatusCode(201)->respond([
            'data' => $data,
        ]);
    }

    /**
     * Respond Created with data.
     *
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondCreatedWithData($data)
    {
        return $this->setStatusCode(201)->respond($data);
    }

    /**
     * respond with error.
     *
     * @param $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }

    /**
     * responsd not found.
     *
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->respond([
            'message'            => $message,
            'status_code'        => IlluminateResponse::HTTP_NOT_FOUND,
        ]);
    }

    /**
     * Respond with error.
     *
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondInternalError($message)
    {
        return $this->respond([
            'error'            => $message,
        ]);
    }

    /**
     * Respond with unauthorized.
     *
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(401)->respondWithError($message);
    }

    /**
     * Respond with forbidden.
     *
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(403)->respondWithError($message);
    }

    /**
     * Respond with no content.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithNoContent()
    {
        return $this->setStatusCode(204)->respond(null);
    }

    /**
     * @param $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function throwValidation($message)
    {
        return $this->respond([
            'message'            => $message,
            'status_code'        => 422,
        ]);
    }

    /**
     * update the status code and remove field from the array.
     *
     * @param array $request
     *
     * @return $this
     */
    public function updateStatusCode(array &$request)
    {
        if (array_key_exists('status_code', $request)) {
            $this->statusCode = $request['status_code'];
            unset($request['status_code']);
        }

        return $this;
    }
}
