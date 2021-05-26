<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarTransmission;

class CarTransmissionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_car_transmission()
    {
        $carTransmission = CarTransmission::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/car_transmissions', $carTransmission
        );

        $this->assertApiResponse($carTransmission);
    }

    /**
     * @test
     */
    public function test_read_car_transmission()
    {
        $carTransmission = CarTransmission::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/car_transmissions/'.$carTransmission->id
        );

        $this->assertApiResponse($carTransmission->toArray());
    }

    /**
     * @test
     */
    public function test_update_car_transmission()
    {
        $carTransmission = CarTransmission::factory()->create();
        $editedCarTransmission = CarTransmission::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/car_transmissions/'.$carTransmission->id,
            $editedCarTransmission
        );

        $this->assertApiResponse($editedCarTransmission);
    }

    /**
     * @test
     */
    public function test_delete_car_transmission()
    {
        $carTransmission = CarTransmission::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/car_transmissions/'.$carTransmission->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/car_transmissions/'.$carTransmission->id
        );

        $this->response->assertStatus(404);
    }
}
