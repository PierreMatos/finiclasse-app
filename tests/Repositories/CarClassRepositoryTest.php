<?php namespace Tests\Repositories;

use App\Models\CarClass;
use App\Repositories\CarClassRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarClassRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarClassRepository
     */
    protected $carClassRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carClassRepo = \App::make(CarClassRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_car_class()
    {
        $carClass = CarClass::factory()->make()->toArray();

        $createdCarClass = $this->carClassRepo->create($carClass);

        $createdCarClass = $createdCarClass->toArray();
        $this->assertArrayHasKey('id', $createdCarClass);
        $this->assertNotNull($createdCarClass['id'], 'Created CarClass must have id specified');
        $this->assertNotNull(CarClass::find($createdCarClass['id']), 'CarClass with given id must be in DB');
        $this->assertModelData($carClass, $createdCarClass);
    }

    /**
     * @test read
     */
    public function test_read_car_class()
    {
        $carClass = CarClass::factory()->create();

        $dbCarClass = $this->carClassRepo->find($carClass->id);

        $dbCarClass = $dbCarClass->toArray();
        $this->assertModelData($carClass->toArray(), $dbCarClass);
    }

    /**
     * @test update
     */
    public function test_update_car_class()
    {
        $carClass = CarClass::factory()->create();
        $fakeCarClass = CarClass::factory()->make()->toArray();

        $updatedCarClass = $this->carClassRepo->update($fakeCarClass, $carClass->id);

        $this->assertModelData($fakeCarClass, $updatedCarClass->toArray());
        $dbCarClass = $this->carClassRepo->find($carClass->id);
        $this->assertModelData($fakeCarClass, $dbCarClass->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_car_class()
    {
        $carClass = CarClass::factory()->create();

        $resp = $this->carClassRepo->delete($carClass->id);

        $this->assertTrue($resp);
        $this->assertNull(CarClass::find($carClass->id), 'CarClass should not exist in DB');
    }
}
