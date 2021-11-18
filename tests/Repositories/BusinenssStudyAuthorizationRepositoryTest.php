<?php namespace Tests\Repositories;

use App\Models\BusinessStudyAuthorization;
use App\Repositories\BusinessStudyAuthorizationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BusinessStudyAuthorizationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BusinessStudyAuthorizationRepository
     */
    protected $BusinessStudyAuthorizationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->BusinessStudyAuthorizationRepo = \App::make(BusinessStudyAuthorizationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_businenss_study_authorization()
    {
        $BusinessStudyAuthorization = BusinessStudyAuthorization::factory()->make()->toArray();

        $createdBusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepo->create($BusinessStudyAuthorization);

        $createdBusinessStudyAuthorization = $createdBusinessStudyAuthorization->toArray();
        $this->assertArrayHasKey('id', $createdBusinessStudyAuthorization);
        $this->assertNotNull($createdBusinessStudyAuthorization['id'], 'Created BusinessStudyAuthorization must have id specified');
        $this->assertNotNull(BusinessStudyAuthorization::find($createdBusinessStudyAuthorization['id']), 'BusinessStudyAuthorization with given id must be in DB');
        $this->assertModelData($BusinessStudyAuthorization, $createdBusinessStudyAuthorization);
    }

    /**
     * @test read
     */
    public function test_read_businenss_study_authorization()
    {
        $BusinessStudyAuthorization = BusinessStudyAuthorization::factory()->create();

        $dbBusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepo->find($BusinessStudyAuthorization->id);

        $dbBusinessStudyAuthorization = $dbBusinessStudyAuthorization->toArray();
        $this->assertModelData($BusinessStudyAuthorization->toArray(), $dbBusinessStudyAuthorization);
    }

    /**
     * @test update
     */
    public function test_update_businenss_study_authorization()
    {
        $BusinessStudyAuthorization = BusinessStudyAuthorization::factory()->create();
        $fakeBusinessStudyAuthorization = BusinessStudyAuthorization::factory()->make()->toArray();

        $updatedBusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepo->update($fakeBusinessStudyAuthorization, $BusinessStudyAuthorization->id);

        $this->assertModelData($fakeBusinessStudyAuthorization, $updatedBusinessStudyAuthorization->toArray());
        $dbBusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepo->find($BusinessStudyAuthorization->id);
        $this->assertModelData($fakeBusinessStudyAuthorization, $dbBusinessStudyAuthorization->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_businenss_study_authorization()
    {
        $BusinessStudyAuthorization = BusinessStudyAuthorization::factory()->create();

        $resp = $this->BusinessStudyAuthorizationRepo->delete($BusinessStudyAuthorization->id);

        $this->assertTrue($resp);
        $this->assertNull(BusinessStudyAuthorization::find($BusinessStudyAuthorization->id), 'BusinessStudyAuthorization should not exist in DB');
    }
}
