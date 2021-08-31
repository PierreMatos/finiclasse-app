<?php namespace Tests\Repositories;

use App\Models\ClientType;
use App\Repositories\ClientTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ClientTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClientTypeRepository
     */
    protected $clientTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientTypeRepo = \App::make(ClientTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_type()
    {
        $clientType = ClientType::factory()->make()->toArray();

        $createdClientType = $this->clientTypeRepo->create($clientType);

        $createdClientType = $createdClientType->toArray();
        $this->assertArrayHasKey('id', $createdClientType);
        $this->assertNotNull($createdClientType['id'], 'Created ClientType must have id specified');
        $this->assertNotNull(ClientType::find($createdClientType['id']), 'ClientType with given id must be in DB');
        $this->assertModelData($clientType, $createdClientType);
    }

    /**
     * @test read
     */
    public function test_read_client_type()
    {
        $clientType = ClientType::factory()->create();

        $dbClientType = $this->clientTypeRepo->find($clientType->id);

        $dbClientType = $dbClientType->toArray();
        $this->assertModelData($clientType->toArray(), $dbClientType);
    }

    /**
     * @test update
     */
    public function test_update_client_type()
    {
        $clientType = ClientType::factory()->create();
        $fakeClientType = ClientType::factory()->make()->toArray();

        $updatedClientType = $this->clientTypeRepo->update($fakeClientType, $clientType->id);

        $this->assertModelData($fakeClientType, $updatedClientType->toArray());
        $dbClientType = $this->clientTypeRepo->find($clientType->id);
        $this->assertModelData($fakeClientType, $dbClientType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_type()
    {
        $clientType = ClientType::factory()->create();

        $resp = $this->clientTypeRepo->delete($clientType->id);

        $this->assertTrue($resp);
        $this->assertNull(ClientType::find($clientType->id), 'ClientType should not exist in DB');
    }
}
