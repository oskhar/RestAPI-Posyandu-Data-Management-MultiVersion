<?php

namespace Domain\User\Actions\Admin;

use App\Infrastructure\API\Data\APIResponseData;
use App\Infrastructure\Services\APIResponseService;
use Domain\User\Data\AdminData;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateAdminAction
{
    use AsAction;

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
    public function asController(AdminData $data): JsonResponse
    {
        $this->execute($data);

        return ($this->response)(
            APIResponseData::from()
        );
    }

    /**
     * Execute the business logic.
     * @return void
     */
    public function execute(AdminData $data): void
    {

    }
}
