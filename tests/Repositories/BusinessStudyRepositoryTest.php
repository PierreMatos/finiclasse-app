<?php namespace Tests\Repositories;

use App\Models\BusinessStudy;
use App\Repositories\BusinessStudyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BusinessStudyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BusinessStudyRepository
     */
    protected $businessStudyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->businessStudyRepo = \App::make(BusinessStudyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_business_study()
    {
        $businessStudy = BusinessStudy::factory()->make()->toArray();

        $createdBusinessStudy = $this->businessStudyRepo->create($businessStudy);

        $createdBusinessStudy = $createdBusinessStudy->toArray();
        $this->assertArrayHasKey('id', $createdBusinessStudy);
        $this->assertNotNull($createdBusinessStudy['id'], 'Created BusinessStudy must have id specified');
        $this->assertNotNull(BusinessStudy::find($createdBusinessStudy['id']), 'BusinessStudy with given id must be in DB');
        $this->assertModelData($businessStudy, $createdBusinessStudy);
    }

    /**
     * @test read
     */
    public function test_read_business_study()
    {
        $businessStudy = BusinessStudy::factory()->create();

        $dbBusinessStudy = $this->businessStudyRepo->find($businessStudy->id);

        $dbBusinessStudy = $dbBusinessStudy->toArray();
        $this->assertModelData($businessStudy->toArray(), $dbBusinessStudy);
    }

    /**
     * @test update
     */
    public function test_update_business_study()
    {
        $businessStudy = BusinessStudy::factory()->create();
        $fakeBusinessStudy = BusinessStudy::factory()->make()->toArray();

        $updatedBusinessStudy = $this->businessStudyRepo->update($fakeBusinessStudy, $businessStudy->id);

        $this->assertModelData($fakeBusinessStudy, $updatedBusinessStudy->toArray());
        $dbBusinessStudy = $this->businessStudyRepo->find($businessStudy->id);
        $this->assertModelData($fakeBusinessStudy, $dbBusinessStudy->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_business_study()
    {
        $businessStudy = BusinessStudy::factory()->create();

        $resp = $this->businessStudyRepo->delete($businessStudy->id);

        $this->assertTrue($resp);
        $this->assertNull(BusinessStudy::find($businessStudy->id), 'BusinessStudy should not exist in DB');
    }
}
