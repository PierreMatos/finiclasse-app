<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ClientType;

class ClientTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_type()
    {
        $clientType = ClientType::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_types', $clientType
        );

        $this->assertApiResponse($clientType);
    }

    /**
     * @test
     */
    public function test_read_client_type()
    {
        $clientType = ClientType::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/client_types/'.$clientType->id
        );

        $this->assertApiResponse($clientType->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_type()
    {
        $clientType = ClientType::factory()->create();
        $editedClientType = ClientType::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_types/'.$clientType->id,
            $editedClientType
        );

        $this->assertApiResponse($editedClientType);
    }

    /**
     * @test
     */
    public function test_delete_client_type()
    {
        $clientType = ClientType::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_types/'.$clientType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_types/'.$clientType->id
        );

        $this->response->assertStatus(404);
    }
}
