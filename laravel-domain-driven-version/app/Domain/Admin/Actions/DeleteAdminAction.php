<?php

namespace Domain\Admin\Actions;

use App\Infrastructure\API\Data\APIResponseData;
use App\Infrastructure\API\Enums\APIStatusEnum;
use App\Infrastructure\Exceptions\APIResponseException;
use App\Infrastructure\Services\APIResponseService;
use Domain\Admin\Models\Admin;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteAdminAction
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
    public function asController($id): JsonResponse
    {
        $this->execute($id);

        return ($this->response)(
            APIResponseData::from()
        );
    }

    /**
     * Execute the business logic.
     * @return void
     */
    public function execute($id): void
    {
        Admin::findOrFail($id)
            ->delete();
    }
}
