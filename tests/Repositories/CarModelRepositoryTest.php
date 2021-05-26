<?php namespace Tests\Repositories;

use App\Models\CarModel;
use App\Repositories\CarModelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarModelRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarModelRepository
     */
    protected $carModelRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carModelRepo = \App::make(CarModelRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_car_model()
    {
        $carModel = CarModel::factory()->make()->toArray();

        $createdCarModel = $this->carModelRepo->create($carModel);

        $createdCarModel = $createdCarModel->toArray();
        $this->assertArrayHasKey('id', $createdCarModel);
        $this->assertNotNull($createdCarModel['id'], 'Created CarModel must have id specified');
        $this->assertNotNull(CarModel::find($createdCarModel['id']), 'CarModel with given id must be in DB');
        $this->assertModelData($carModel, $createdCarModel);
    }

    /**
     * @test read
     */
    public function test_read_car_model()
    {
        $carModel = CarModel::factory()->create();

        $dbCarModel = $this->carModelRepo->find($carModel->id);

        $dbCarModel = $dbCarModel->toArray();
        $this->assertModelData($carModel->toArray(), $dbCarModel);
    }

    /**
     * @test update
     */
    public function test_update_car_model()
    {
        $carModel = CarModel::factory()->create();
        $fakeCarModel = CarModel::factory()->make()->toArray();

        $updatedCarModel = $this->carModelRepo->update($fakeCarModel, $carModel->id);

        $this->assertModelData($fakeCarModel, $updatedCarModel->toArray());
        $dbCarModel = $this->carModelRepo->find($carModel->id);
        $this->assertModelData($fakeCarModel, $dbCarModel->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_car_model()
    {
        $carModel = CarModel::factory()->create();

        $resp = $this->carModelRepo->delete($carModel->id);

        $this->assertTrue($resp);
        $this->assertNull(CarModel::find($carModel->id), 'CarModel should not exist in DB');
    }
}
