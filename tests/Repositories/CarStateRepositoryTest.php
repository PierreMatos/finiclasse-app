<?php namespace Tests\Repositories;

use App\Models\CarState;
use App\Repositories\CarStateRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarStateRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarStateRepository
     */
    protected $carStateRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carStateRepo = \App::make(CarStateRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_car_state()
    {
        $carState = CarState::factory()->make()->toArray();

        $createdCarState = $this->carStateRepo->create($carState);

        $createdCarState = $createdCarState->toArray();
        $this->assertArrayHasKey('id', $createdCarState);
        $this->assertNotNull($createdCarState['id'], 'Created CarState must have id specified');
        $this->assertNotNull(CarState::find($createdCarState['id']), 'CarState with given id must be in DB');
        $this->assertModelData($carState, $createdCarState);
    }

    /**
     * @test read
     */
    public function test_read_car_state()
    {
        $carState = CarState::factory()->create();

        $dbCarState = $this->carStateRepo->find($carState->id);

        $dbCarState = $dbCarState->toArray();
        $this->assertModelData($carState->toArray(), $dbCarState);
    }

    /**
     * @test update
     */
    public function test_update_car_state()
    {
        $carState = CarState::factory()->create();
        $fakeCarState = CarState::factory()->make()->toArray();

        $updatedCarState = $this->carStateRepo->update($fakeCarState, $carState->id);

        $this->assertModelData($fakeCarState, $updatedCarState->toArray());
        $dbCarState = $this->carStateRepo->find($carState->id);
        $this->assertModelData($fakeCarState, $dbCarState->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_car_state()
    {
        $carState = CarState::factory()->create();

        $resp = $this->carStateRepo->delete($carState->id);

        $this->assertTrue($resp);
        $this->assertNull(CarState::find($carState->id), 'CarState should not exist in DB');
    }
}
