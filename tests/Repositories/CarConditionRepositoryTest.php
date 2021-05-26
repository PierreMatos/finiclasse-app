<?php namespace Tests\Repositories;

use App\Models\CarCondition;
use App\Repositories\CarConditionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CarConditionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarConditionRepository
     */
    protected $carConditionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->carConditionRepo = \App::make(CarConditionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_car_condition()
    {
        $carCondition = CarCondition::factory()->make()->toArray();

        $createdCarCondition = $this->carConditionRepo->create($carCondition);

        $createdCarCondition = $createdCarCondition->toArray();
        $this->assertArrayHasKey('id', $createdCarCondition);
        $this->assertNotNull($createdCarCondition['id'], 'Created CarCondition must have id specified');
        $this->assertNotNull(CarCondition::find($createdCarCondition['id']), 'CarCondition with given id must be in DB');
        $this->assertModelData($carCondition, $createdCarCondition);
    }

    /**
     * @test read
     */
    public function test_read_car_condition()
    {
        $carCondition = CarCondition::factory()->create();

        $dbCarCondition = $this->carConditionRepo->find($carCondition->id);

        $dbCarCondition = $dbCarCondition->toArray();
        $this->assertModelData($carCondition->toArray(), $dbCarCondition);
    }

    /**
     * @test update
     */
    public function test_update_car_condition()
    {
        $carCondition = CarCondition::factory()->create();
        $fakeCarCondition = CarCondition::factory()->make()->toArray();

        $updatedCarCondition = $this->carConditionRepo->update($fakeCarCondition, $carCondition->id);

        $this->assertModelData($fakeCarCondition, $updatedCarCondition->toArray());
        $dbCarCondition = $this->carConditionRepo->find($carCondition->id);
        $this->assertModelData($fakeCarCondition, $dbCarCondition->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_car_condition()
    {
        $carCondition = CarCondition::factory()->create();

        $resp = $this->carConditionRepo->delete($carCondition->id);

        $this->assertTrue($resp);
        $this->assertNull(CarCondition::find($carCondition->id), 'CarCondition should not exist in DB');
    }
}
