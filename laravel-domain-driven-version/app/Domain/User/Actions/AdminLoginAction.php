<?php

namespace Domain\User\Actions;

use App\Infrastructure\API\Data\APIResponseData;
use App\Infrastructure\Services\APIResponseService;
use Carbon\Carbon;
use Domain\User\Data\AccessTokenData;
use Domain\User\Data\LoginData;
use Domain\User\Services\LoginValidationService;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class AdminLoginAction
{
    use AsAction;

    protected $errors = [];
    protected APIResponseService $response;

    /**
     * Create a new service instance.
     * @param \App\Infrastructure\Services\APIResponseService $response
     */
    public function __construct(APIResponseService $response)
    {
        $this->response = $response;
    }

    /**
     * Run the business processes.
     * @return \Illuminate\Http\JsonResponse
     */
    public function asController(LoginData $data): JsonResponse
    {
        $token = $this->execute($data);

        return ($this->response)(
            APIResponseData::from([
                "data" => [
                    "token" => $token
                ]
            ])
        );
    }

    /**
     * Execute the business logic.
     * @param \Domain\User\Data\LoginData $data
     * @return AccessTokenData
     */
    public function execute(LoginData $data): AccessTokenData
    {
        $user = $data->validateUser("admin");

        return AccessTokenData::fromUserModel($user, $data->remember_me);
    }

}
