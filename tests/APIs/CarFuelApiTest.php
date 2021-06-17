<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarFuel;

class CarFuelApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_car_fuel()
    {
        $carFuel = CarFuel::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/car_fuels', $carFuel
        );

        $this->assertApiResponse($carFuel);
    }

    /**
     * @test
     */
    public function test_read_car_fuel()
    {
        $carFuel = CarFuel::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/car_fuels/'.$carFuel->id
        );

        $this->assertApiResponse($carFuel->toArray());
    }

    /**
     * @test
     */
    public function test_update_car_fuel()
    {
        $carFuel = CarFuel::factory()->create();
        $editedCarFuel = CarFuel::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/car_fuels/'.$carFuel->id,
            $editedCarFuel
        );

        $this->assertApiResponse($editedCarFuel);
    }

    /**
     * @test
     */
    public function test_delete_car_fuel()
    {
        $carFuel = CarFuel::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/car_fuels/'.$carFuel->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/car_fuels/'.$carFuel->id
        );

        $this->response->assertStatus(404);
    }
}
