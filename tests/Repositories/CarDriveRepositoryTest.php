<?php namespace Tests\Repositories;

use App\Models\CarDrive;
use App\Repositories\CarDriveRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarDriveRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarDriveRepository
     */
    protected $carDriveRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carDriveRepo = \App::make(CarDriveRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_car_drive()
    {
        $carDrive = CarDrive::factory()->make()->toArray();

        $createdCarDrive = $this->carDriveRepo->create($carDrive);

        $createdCarDrive = $createdCarDrive->toArray();
        $this->assertArrayHasKey('id', $createdCarDrive);
        $this->assertNotNull($createdCarDrive['id'], 'Created CarDrive must have id specified');
        $this->assertNotNull(CarDrive::find($createdCarDrive['id']), 'CarDrive with given id must be in DB');
        $this->assertModelData($carDrive, $createdCarDrive);
    }

    /**
     * @test read
     */
    public function test_read_car_drive()
    {
        $carDrive = CarDrive::factory()->create();

        $dbCarDrive = $this->carDriveRepo->find($carDrive->id);

        $dbCarDrive = $dbCarDrive->toArray();
        $this->assertModelData($carDrive->toArray(), $dbCarDrive);
    }

    /**
     * @test update
     */
    public function test_update_car_drive()
    {
        $carDrive = CarDrive::factory()->create();
        $fakeCarDrive = CarDrive::factory()->make()->toArray();

        $updatedCarDrive = $this->carDriveRepo->update($fakeCarDrive, $carDrive->id);

        $this->assertModelData($fakeCarDrive, $updatedCarDrive->toArray());
        $dbCarDrive = $this->carDriveRepo->find($carDrive->id);
        $this->assertModelData($fakeCarDrive, $dbCarDrive->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_car_drive()
    {
        $carDrive = CarDrive::factory()->create();

        $resp = $this->carDriveRepo->delete($carDrive->id);

        $this->assertTrue($resp);
        $this->assertNull(CarDrive::find($carDrive->id), 'CarDrive should not exist in DB');
    }
}
