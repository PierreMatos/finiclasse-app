<?php namespace Tests\Repositories;

use App\Models\CarFuel;
use App\Repositories\CarFuelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarFuelRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarFuelRepository
     */
    protected $carFuelRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carFuelRepo = \App::make(CarFuelRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_car_fuel()
    {
        $carFuel = CarFuel::factory()->make()->toArray();

        $createdCarFuel = $this->carFuelRepo->create($carFuel);

        $createdCarFuel = $createdCarFuel->toArray();
        $this->assertArrayHasKey('id', $createdCarFuel);
        $this->assertNotNull($createdCarFuel['id'], 'Created CarFuel must have id specified');
        $this->assertNotNull(CarFuel::find($createdCarFuel['id']), 'CarFuel with given id must be in DB');
        $this->assertModelData($carFuel, $createdCarFuel);
    }

    /**
     * @test read
     */
    public function test_read_car_fuel()
    {
        $carFuel = CarFuel::factory()->create();

        $dbCarFuel = $this->carFuelRepo->find($carFuel->id);

        $dbCarFuel = $dbCarFuel->toArray();
        $this->assertModelData($carFuel->toArray(), $dbCarFuel);
    }

    /**
     * @test update
     */
    public function test_update_car_fuel()
    {
        $carFuel = CarFuel::factory()->create();
        $fakeCarFuel = CarFuel::factory()->make()->toArray();

        $updatedCarFuel = $this->carFuelRepo->update($fakeCarFuel, $carFuel->id);

        $this->assertModelData($fakeCarFuel, $updatedCarFuel->toArray());
        $dbCarFuel = $this->carFuelRepo->find($carFuel->id);
        $this->assertModelData($fakeCarFuel, $dbCarFuel->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_car_fuel()
    {
        $carFuel = CarFuel::factory()->create();

        $resp = $this->carFuelRepo->delete($carFuel->id);

        $this->assertTrue($resp);
        $this->assertNull(CarFuel::find($carFuel->id), 'CarFuel should not exist in DB');
    }
}
