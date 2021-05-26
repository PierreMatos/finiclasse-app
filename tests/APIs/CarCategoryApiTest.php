<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CarCategory;

class CarCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_car_category()
    {
        $carCategory = CarCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/car_categories', $carCategory
        );

        $this->assertApiResponse($carCategory);
    }

    /**
     * @test
     */
    public function test_read_car_category()
    {
        $carCategory = CarCategory::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/car_categories/'.$carCategory->id
        );

        $this->assertApiResponse($carCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_car_category()
    {
        $carCategory = CarCategory::factory()->create();
        $editedCarCategory = CarCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/car_categories/'.$carCategory->id,
            $editedCarCategory
        );

        $this->assertApiResponse($editedCarCategory);
    }

    /**
     * @test
     */
    public function test_delete_car_category()
    {
        $carCategory = CarCategory::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/car_categories/'.$carCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/car_categories/'.$carCategory->id
        );

        $this->response->assertStatus(404);
    }
}
