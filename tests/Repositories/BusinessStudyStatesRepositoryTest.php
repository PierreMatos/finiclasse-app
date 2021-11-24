<?php namespace Tests\Repositories;

use App\Models\BusinessStudyStates;
use App\Repositories\BusinessStudyStatesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BusinessStudyStatesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BusinessStudyStatesRepository
     */
    protected $businessStudyStatesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->businessStudyStatesRepo = \App::make(BusinessStudyStatesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_business_study_states()
    {
        $businessStudyStates = BusinessStudyStates::factory()->make()->toArray();

        $createdBusinessStudyStates = $this->businessStudyStatesRepo->create($businessStudyStates);

        $createdBusinessStudyStates = $createdBusinessStudyStates->toArray();
        $this->assertArrayHasKey('id', $createdBusinessStudyStates);
        $this->assertNotNull($createdBusinessStudyStates['id'], 'Created BusinessStudyStates must have id specified');
        $this->assertNotNull(BusinessStudyStates::find($createdBusinessStudyStates['id']), 'BusinessStudyStates with given id must be in DB');
        $this->assertModelData($businessStudyStates, $createdBusinessStudyStates);
    }

    /**
     * @test read
     */
    public function test_read_business_study_states()
    {
        $businessStudyStates = BusinessStudyStates::factory()->create();

        $dbBusinessStudyStates = $this->businessStudyStatesRepo->find($businessStudyStates->id);

        $dbBusinessStudyStates = $dbBusinessStudyStates->toArray();
        $this->assertModelData($businessStudyStates->toArray(), $dbBusinessStudyStates);
    }

    /**
     * @test update
     */
    public function test_update_business_study_states()
    {
        $businessStudyStates = BusinessStudyStates::factory()->create();
        $fakeBusinessStudyStates = BusinessStudyStates::factory()->make()->toArray();

        $updatedBusinessStudyStates = $this->businessStudyStatesRepo->update($fakeBusinessStudyStates, $businessStudyStates->id);

        $this->assertModelData($fakeBusinessStudyStates, $updatedBusinessStudyStates->toArray());
        $dbBusinessStudyStates = $this->businessStudyStatesRepo->find($businessStudyStates->id);
        $this->assertModelData($fakeBusinessStudyStates, $dbBusinessStudyStates->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_business_study_states()
    {
        $businessStudyStates = BusinessStudyStates::factory()->create();

        $resp = $this->businessStudyStatesRepo->delete($businessStudyStates->id);

        $this->assertTrue($resp);
        $this->assertNull(BusinessStudyStates::find($businessStudyStates->id), 'BusinessStudyStates should not exist in DB');
    }
}
