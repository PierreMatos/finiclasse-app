<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TradeinState;

class TradeinStateApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tradein_state()
    {
        $tradeinState = TradeinState::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tradein_states', $tradeinState
        );

        $this->assertApiResponse($tradeinState);
    }

    /**
     * @test
     */
    public function test_read_tradein_state()
    {
        $tradeinState = TradeinState::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tradein_states/'.$tradeinState->id
        );

        $this->assertApiResponse($tradeinState->toArray());
    }

    /**
     * @test
     */
    public function test_update_tradein_state()
    {
        $tradeinState = TradeinState::factory()->create();
        $editedTradeinState = TradeinState::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tradein_states/'.$tradeinState->id,
            $editedTradeinState
        );

        $this->assertApiResponse($editedTradeinState);
    }

    /**
     * @test
     */
    public function test_delete_tradein_state()
    {
        $tradeinState = TradeinState::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tradein_states/'.$tradeinState->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tradein_states/'.$tradeinState->id
        );

        $this->response->assertStatus(404);
    }
}
