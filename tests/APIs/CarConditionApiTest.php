<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarCondition;

class CarConditionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_car_condition()
    {
        $carCondition = CarCondition::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/car_conditions', $carCondition
        );

        $this->assertApiResponse($carCondition);
    }

    /**
     * @test
     */
    public function test_read_car_condition()
    {
        $carCondition = CarCondition::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/car_conditions/'.$carCondition->id
        );

        $this->assertApiResponse($carCondition->toArray());
    }

    /**
     * @test
     */
    public function test_update_car_condition()
    {
        $carCondition = CarCondition::factory()->create();
        $editedCarCondition = CarCondition::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/car_conditions/'.$carCondition->id,
            $editedCarCondition
        );

        $this->assertApiResponse($editedCarCondition);
    }

    /**
     * @test
     */
    public function test_delete_car_condition()
    {
        $carCondition = CarCondition::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/car_conditions/'.$carCondition->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/car_conditions/'.$carCondition->id
        );

        $this->response->assertStatus(404);
    }
}
