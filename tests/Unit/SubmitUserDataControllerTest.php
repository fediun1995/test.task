<?php

namespace Tests\Unit;

use App\Http\Controllers\SubmitUserDataController;
use App\Http\Requests\SubmitUserDataRequest;
use App\Services\UserDataSubmitterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Mockery;

class SubmitUserDataControllerTest extends TestCase
{
    public function testInvoke()
    {
        $serviceMock = Mockery::mock(UserDataSubmitterService::class);

        $serviceMock->shouldReceive('submitUserData')
            ->once()
            ->with(['name' => 'John Doe'])
            ->andReturnNull();

        $requestMock = Mockery::mock(SubmitUserDataRequest::class);
        $requestMock->shouldReceive('validated')
            ->once()
            ->andReturn(['name' => 'John Doe']);

        $controller = new SubmitUserDataController($serviceMock);

        $response = $controller($requestMock);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(Response::HTTP_ACCEPTED, $response->getStatusCode());
        $this->assertEquals(['message' => 'Submission data accepted'], $response->getData(true));
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
