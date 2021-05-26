<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarDrive;

class CarDriveApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_car_drive()
    {
        $carDrive = CarDrive::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/car_drives', $carDrive
        );

        $this->assertApiResponse($carDrive);
    }

    /**
     * @test
     */
    public function test_read_car_drive()
    {
        $carDrive = CarDrive::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/car_drives/'.$carDrive->id
        );

        $this->assertApiResponse($carDrive->toArray());
    }

    /**
     * @test
     */
    public function test_update_car_drive()
    {
        $carDrive = CarDrive::factory()->create();
        $editedCarDrive = CarDrive::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/car_drives/'.$carDrive->id,
            $editedCarDrive
        );

        $this->assertApiResponse($editedCarDrive);
    }

    /**
     * @test
     */
    public function test_delete_car_drive()
    {
        $carDrive = CarDrive::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/car_drives/'.$carDrive->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/car_drives/'.$carDrive->id
        );

        $this->response->assertStatus(404);
    }
}
