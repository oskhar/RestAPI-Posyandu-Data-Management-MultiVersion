<?php

namespace Domain\User\Actions;

use App\Infrastructure\API\Data\APIResponseData;
use App\Infrastructure\API\Enums\APIStatusEnum;
use App\Infrastructure\Exceptions\APIResponseException;
use App\Infrastructure\Services\APIResponseService;
use Carbon\Carbon;
use Domain\User\Data\AccessTokenData;
use Domain\User\Data\LoginData;
use Domain\User\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class AuthenticationAdminAction
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
     * @return \Laravel\Sanctum\NewAccessToken
     */
    public function execute(LoginData $data): AccessTokenData
    {
        try {
            $user = User::where("role", "admin")
                ->where("email", $data->email)
                ->first();

            if (!$user) {
                $this->errors[] = "NIM atau Password tidak sesuai!";
            }

            if ($user && !Hash::check($data->password, $user->password)) {
                $this->errors[] = "NIM atau Password tidak sesuai!";
            }

            if (!empty($this->errors)) {
                throw new \Exception();
            }

            $expiresAt = Carbon::now()->addMinutes(config('sanctum.expiration'));

            return AccessTokenData::from([
                "access_token" => $user->createToken(
                    'personal_access_tokens',
                    ['*'],
                    $expiresAt
                )->plainTextToken,
                "expires_at" => $expiresAt,
            ]);

        } catch (\Exception $exception) {

            throw new APIResponseException(
                $this->errors,
                $exception,
                $this->response
            );

        }
    }

}
