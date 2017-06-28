<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\ReviewStoreRequest;
use App\Models\CollectedReview;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Http\Request;
use App\Models\RequesterSettings;
use App\ApiTransformers\RequesterSettingsTransformer;

class RequesterController extends ApiBaseController
{
    /**
     * @var RequesterSettings
     */
    protected $requesterSettings;

    /**
     * @var RequesterSettingsTransformer
     */
    protected $transformer;

    /**
     * @var CollectedReview
     */
    protected $collectedReview;

    /**
     * RequesterController constructor.
     *
     * @param Request $request
     * @param Response $response
     * @param RequesterSettings $requesterSettings
     * @param RequesterSettingsTransformer $transformer
     * @param CollectedReview $collectedReview
     */
    public function __construct(
        Request $request,
        Response $response,
        RequesterSettings $requesterSettings,
        RequesterSettingsTransformer $transformer,
        CollectedReview $collectedReview
    ) {
        parent::__construct($request, $response);
        $this->requesterSettings = $requesterSettings;
        $this->transformer = $transformer;
        $this->collectedReview = $collectedReview;
    }

    /**
     * @param int $companyId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $companyId)
    {
        $settings = $this->requesterSettings->getForCompany($companyId);
        $settings = $this->transformer->transform($settings);

        return $this->successResponse($settings);
    }

    /**
     * @param ReviewStoreRequest $request
     *
     * @return string
     */
    public function store(ReviewStoreRequest $request)
    {
        $collectedReview = new CollectedReview($request->validatedOnly());
        $collectedReview->save();

        return $this->successResponse($collectedReview);
    }
}