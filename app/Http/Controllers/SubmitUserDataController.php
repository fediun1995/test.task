<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitUserDataRequest;
use App\Services\UserDataSubmitterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

readonly class SubmitUserDataController
{
    public function __construct(private UserDataSubmitterService $userDataSubmitterService)
    {

    }
    public function __invoke(SubmitUserDataRequest $request): JsonResponse
    {
        $this->userDataSubmitterService->submitUserData($request->validated());

        return response()->json(['message' => 'Submission data accepted'], Response::HTTP_ACCEPTED);
    }
}
