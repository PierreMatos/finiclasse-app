<?php namespace Tests\Repositories;

use App\Models\CarCategory;
use App\Repositories\CarCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarCategoryRepository
     */
    protected $carCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carCategoryRepo = \App::make(CarCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_car_category()
    {
        $carCategory = CarCategory::factory()->make()->toArray();

        $createdCarCategory = $this->carCategoryRepo->create($carCategory);

        $createdCarCategory = $createdCarCategory->toArray();
        $this->assertArrayHasKey('id', $createdCarCategory);
        $this->assertNotNull($createdCarCategory['id'], 'Created CarCategory must have id specified');
        $this->assertNotNull(CarCategory::find($createdCarCategory['id']), 'CarCategory with given id must be in DB');
        $this->assertModelData($carCategory, $createdCarCategory);
    }

    /**
     * @test read
     */
    public function test_read_car_category()
    {
        $carCategory = CarCategory::factory()->create();

        $dbCarCategory = $this->carCategoryRepo->find($carCategory->id);

        $dbCarCategory = $dbCarCategory->toArray();
        $this->assertModelData($carCategory->toArray(), $dbCarCategory);
    }

    /**
     * @test update
     */
    public function test_update_car_category()
    {
        $carCategory = CarCategory::factory()->create();
        $fakeCarCategory = CarCategory::factory()->make()->toArray();

        $updatedCarCategory = $this->carCategoryRepo->update($fakeCarCategory, $carCategory->id);

        $this->assertModelData($fakeCarCategory, $updatedCarCategory->toArray());
        $dbCarCategory = $this->carCategoryRepo->find($carCategory->id);
        $this->assertModelData($fakeCarCategory, $dbCarCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_car_category()
    {
        $carCategory = CarCategory::factory()->create();

        $resp = $this->carCategoryRepo->delete($carCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(CarCategory::find($carCategory->id), 'CarCategory should not exist in DB');
    }
}
