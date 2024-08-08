<?php

namespace App\Services;

use App\Jobs\SubmitUserData;

class UserDataSubmitterService
{
    //Usually I prefer to use DTO (Data Transfer Object) to pass data between layers but since it is a simple example, I will use array
    public function submitUserData(array $data): void
    {
        SubmitUserData::dispatch($data);
    }
}
