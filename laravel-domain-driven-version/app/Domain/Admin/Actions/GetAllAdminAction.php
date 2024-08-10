<?php

namespace Domain\Admin\Actions;

use App\Infrastructure\API\Data\APIResponseData;
use App\Infrastructure\API\Enums\APIStatusEnum;
use App\Infrastructure\Exceptions\APIResponseException;
use App\Infrastructure\Services\APIResponseService;
use Domain\Admin\Data\AdminData;
use Domain\Admin\Models\Admin;
use Domain\Shared\Data\FilterData;
use Domain\Shared\Data\PaginationData;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class GetAllAdminAction
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
    public function asController(FilterData $filter): JsonResponse
    {
        $result = $this->execute($filter);

        return ($this->response)(
            APIResponseData::from([
                "data" => $result["data"],
                "pagination" => $result["pagination"]
            ])
        );
    }

    /**
     * Execute the business logic.
     * @return mixed
     */
    public function execute(FilterData $filter): mixed
    {
        $admin = Admin::getDetailedData();
        if ($filter->search)
            $admin->where("users.full_name", "LIKE", "%" . $filter->search . "%");

        if ($filter->sort)
            $admin->orderBy("users." . $filter->sort->column(), $filter->sort->direction());

        $admin = $admin->paginate($filter->length);

        if ($admin->total() <= 0)
            throw new APIResponseException(["No results found for your search criteria. Please refine your search and try again."], APIStatusEnum::NOT_FOUND);

        if ($filter->page > $admin->lastPage())
            throw new APIResponseException(["You have exceeded the maximum page limit. Please check the available pages and try again."], APIStatusEnum::NOT_FOUND);

        return [
            "data" => [
                "admin" => $admin->getCollection()
                    ->map(fn($item) => AdminData::from($item))
            ],
            "pagination" => PaginationData::fromPaginate($admin),
        ];
    }
}
