<?php namespace Tests\Repositories;

use App\Models\BusinenssStudyAuthorization;
use App\Repositories\BusinenssStudyAuthorizationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BusinenssStudyAuthorizationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BusinenssStudyAuthorizationRepository
     */
    protected $businenssStudyAuthorizationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->businenssStudyAuthorizationRepo = \App::make(BusinenssStudyAuthorizationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_businenss_study_authorization()
    {
        $businenssStudyAuthorization = BusinenssStudyAuthorization::factory()->make()->toArray();

        $createdBusinenssStudyAuthorization = $this->businenssStudyAuthorizationRepo->create($businenssStudyAuthorization);

        $createdBusinenssStudyAuthorization = $createdBusinenssStudyAuthorization->toArray();
        $this->assertArrayHasKey('id', $createdBusinenssStudyAuthorization);
        $this->assertNotNull($createdBusinenssStudyAuthorization['id'], 'Created BusinenssStudyAuthorization must have id specified');
        $this->assertNotNull(BusinenssStudyAuthorization::find($createdBusinenssStudyAuthorization['id']), 'BusinenssStudyAuthorization with given id must be in DB');
        $this->assertModelData($businenssStudyAuthorization, $createdBusinenssStudyAuthorization);
    }

    /**
     * @test read
     */
    public function test_read_businenss_study_authorization()
    {
        $businenssStudyAuthorization = BusinenssStudyAuthorization::factory()->create();

        $dbBusinenssStudyAuthorization = $this->businenssStudyAuthorizationRepo->find($businenssStudyAuthorization->id);

        $dbBusinenssStudyAuthorization = $dbBusinenssStudyAuthorization->toArray();
        $this->assertModelData($businenssStudyAuthorization->toArray(), $dbBusinenssStudyAuthorization);
    }

    /**
     * @test update
     */
    public function test_update_businenss_study_authorization()
    {
        $businenssStudyAuthorization = BusinenssStudyAuthorization::factory()->create();
        $fakeBusinenssStudyAuthorization = BusinenssStudyAuthorization::factory()->make()->toArray();

        $updatedBusinenssStudyAuthorization = $this->businenssStudyAuthorizationRepo->update($fakeBusinenssStudyAuthorization, $businenssStudyAuthorization->id);

        $this->assertModelData($fakeBusinenssStudyAuthorization, $updatedBusinenssStudyAuthorization->toArray());
        $dbBusinenssStudyAuthorization = $this->businenssStudyAuthorizationRepo->find($businenssStudyAuthorization->id);
        $this->assertModelData($fakeBusinenssStudyAuthorization, $dbBusinenssStudyAuthorization->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_businenss_study_authorization()
    {
        $businenssStudyAuthorization = BusinenssStudyAuthorization::factory()->create();

        $resp = $this->businenssStudyAuthorizationRepo->delete($businenssStudyAuthorization->id);

        $this->assertTrue($resp);
        $this->assertNull(BusinenssStudyAuthorization::find($businenssStudyAuthorization->id), 'BusinenssStudyAuthorization should not exist in DB');
    }
}
