<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarModel;

class CarModelApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_car_model()
    {
        $carModel = CarModel::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/car_models', $carModel
        );

        $this->assertApiResponse($carModel);
    }

    /**
     * @test
     */
    public function test_read_car_model()
    {
        $carModel = CarModel::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/car_models/'.$carModel->id
        );

        $this->assertApiResponse($carModel->toArray());
    }

    /**
     * @test
     */
    public function test_update_car_model()
    {
        $carModel = CarModel::factory()->create();
        $editedCarModel = CarModel::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/car_models/'.$carModel->id,
            $editedCarModel
        );

        $this->assertApiResponse($editedCarModel);
    }

    /**
     * @test
     */
    public function test_delete_car_model()
    {
        $carModel = CarModel::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/car_models/'.$carModel->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/car_models/'.$carModel->id
        );

        $this->response->assertStatus(404);
    }
}
