<?php namespace Tests\Repositories;

use App\Models\CarTransmission;
use App\Repositories\CarTransmissionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarTransmissionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarTransmissionRepository
     */
    protected $carTransmissionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carTransmissionRepo = \App::make(CarTransmissionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_car_transmission()
    {
        $carTransmission = CarTransmission::factory()->make()->toArray();

        $createdCarTransmission = $this->carTransmissionRepo->create($carTransmission);

        $createdCarTransmission = $createdCarTransmission->toArray();
        $this->assertArrayHasKey('id', $createdCarTransmission);
        $this->assertNotNull($createdCarTransmission['id'], 'Created CarTransmission must have id specified');
        $this->assertNotNull(CarTransmission::find($createdCarTransmission['id']), 'CarTransmission with given id must be in DB');
        $this->assertModelData($carTransmission, $createdCarTransmission);
    }

    /**
     * @test read
     */
    public function test_read_car_transmission()
    {
        $carTransmission = CarTransmission::factory()->create();

        $dbCarTransmission = $this->carTransmissionRepo->find($carTransmission->id);

        $dbCarTransmission = $dbCarTransmission->toArray();
        $this->assertModelData($carTransmission->toArray(), $dbCarTransmission);
    }

    /**
     * @test update
     */
    public function test_update_car_transmission()
    {
        $carTransmission = CarTransmission::factory()->create();
        $fakeCarTransmission = CarTransmission::factory()->make()->toArray();

        $updatedCarTransmission = $this->carTransmissionRepo->update($fakeCarTransmission, $carTransmission->id);

        $this->assertModelData($fakeCarTransmission, $updatedCarTransmission->toArray());
        $dbCarTransmission = $this->carTransmissionRepo->find($carTransmission->id);
        $this->assertModelData($fakeCarTransmission, $dbCarTransmission->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_car_transmission()
    {
        $carTransmission = CarTransmission::factory()->create();

        $resp = $this->carTransmissionRepo->delete($carTransmission->id);

        $this->assertTrue($resp);
        $this->assertNull(CarTransmission::find($carTransmission->id), 'CarTransmission should not exist in DB');
    }
}
