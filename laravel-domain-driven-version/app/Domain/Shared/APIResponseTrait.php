<?php

namespace Domain\Shared;

use Domain\Shared\Data\APIResponseData;
use Domain\Shared\Data\PaginationData;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

trait APIResponseTrait
{
    public function responseWithPagination(
        LengthAwarePaginator $paginator,
        string $message = 'Successfully',
        bool $status = true,
        ?string $transaction_id
    ): JsonResponse {

        return response()->json(
            APIResponseData::from(
                status: $status,
                message: $message,
                data: $paginator->items(),
                pagination: PaginationData::from(
                    current_page: $paginator->currentPage(),
                    total_data: $paginator->total(),
                    total_pages: $paginator->lastPage(),
                    from: $paginator->firstItem(),
                    to: $paginator->lastItem()
                ),
                transaction_id: $transaction_id
            )
        )->setStatusCode(200);
    }
}
