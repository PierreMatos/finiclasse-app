<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarState;

class CarStateApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_car_state()
    {
        $carState = CarState::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/car_states', $carState
        );

        $this->assertApiResponse($carState);
    }

    /**
     * @test
     */
    public function test_read_car_state()
    {
        $carState = CarState::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/car_states/'.$carState->id
        );

        $this->assertApiResponse($carState->toArray());
    }

    /**
     * @test
     */
    public function test_update_car_state()
    {
        $carState = CarState::factory()->create();
        $editedCarState = CarState::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/car_states/'.$carState->id,
            $editedCarState
        );

        $this->assertApiResponse($editedCarState);
    }

    /**
     * @test
     */
    public function test_delete_car_state()
    {
        $carState = CarState::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/car_states/'.$carState->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/car_states/'.$carState->id
        );

        $this->response->assertStatus(404);
    }
}
