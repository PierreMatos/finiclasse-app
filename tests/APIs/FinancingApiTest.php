<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Financing;

class FinancingApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_financing()
    {
        $financing = Financing::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/financings', $financing
        );

        $this->assertApiResponse($financing);
    }

    /**
     * @test
     */
    public function test_read_financing()
    {
        $financing = Financing::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/financings/'.$financing->id
        );

        $this->assertApiResponse($financing->toArray());
    }

    /**
     * @test
     */
    public function test_update_financing()
    {
        $financing = Financing::factory()->create();
        $editedFinancing = Financing::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/financings/'.$financing->id,
            $editedFinancing
        );

        $this->assertApiResponse($editedFinancing);
    }

    /**
     * @test
     */
    public function test_delete_financing()
    {
        $financing = Financing::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/financings/'.$financing->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/financings/'.$financing->id
        );

        $this->response->assertStatus(404);
    }
}
