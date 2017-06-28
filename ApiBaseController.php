<?php
namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory as Response;

class ApiBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * Controller constructor.
     *
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data)
    {
        return $this->response->json($data, 200);
    }

    /**
     * @param string $message
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function failureResponse(string $message, int $code)
    {
        return $this->response->json(['message' => $message], $code);
    }
}