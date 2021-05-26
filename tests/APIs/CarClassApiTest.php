<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarClass;

class CarClassApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_car_class()
    {
        $carClass = CarClass::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/car_classes', $carClass
        );

        $this->assertApiResponse($carClass);
    }

    /**
     * @test
     */
    public function test_read_car_class()
    {
        $carClass = CarClass::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/car_classes/'.$carClass->id
        );

        $this->assertApiResponse($carClass->toArray());
    }

    /**
     * @test
     */
    public function test_update_car_class()
    {
        $carClass = CarClass::factory()->create();
        $editedCarClass = CarClass::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/car_classes/'.$carClass->id,
            $editedCarClass
        );

        $this->assertApiResponse($editedCarClass);
    }

    /**
     * @test
     */
    public function test_delete_car_class()
    {
        $carClass = CarClass::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/car_classes/'.$carClass->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/car_classes/'.$carClass->id
        );

        $this->response->assertStatus(404);
    }
}
