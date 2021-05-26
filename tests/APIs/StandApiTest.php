<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Stand;

class StandApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stand()
    {
        $stand = Stand::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/stands', $stand
        );

        $this->assertApiResponse($stand);
    }

    /**
     * @test
     */
    public function test_read_stand()
    {
        $stand = Stand::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/stands/'.$stand->id
        );

        $this->assertApiResponse($stand->toArray());
    }

    /**
     * @test
     */
    public function test_update_stand()
    {
        $stand = Stand::factory()->create();
        $editedStand = Stand::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/stands/'.$stand->id,
            $editedStand
        );

        $this->assertApiResponse($editedStand);
    }

    /**
     * @test
     */
    public function test_delete_stand()
    {
        $stand = Stand::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/stands/'.$stand->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/stands/'.$stand->id
        );

        $this->response->assertStatus(404);
    }
}
