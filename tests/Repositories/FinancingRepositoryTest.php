<?php namespace Tests\Repositories;

use App\Models\Financing;
use App\Repositories\FinancingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FinancingRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FinancingRepository
     */
    protected $financingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->financingRepo = \App::make(FinancingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_financing()
    {
        $financing = Financing::factory()->make()->toArray();

        $createdFinancing = $this->financingRepo->create($financing);

        $createdFinancing = $createdFinancing->toArray();
        $this->assertArrayHasKey('id', $createdFinancing);
        $this->assertNotNull($createdFinancing['id'], 'Created Financing must have id specified');
        $this->assertNotNull(Financing::find($createdFinancing['id']), 'Financing with given id must be in DB');
        $this->assertModelData($financing, $createdFinancing);
    }

    /**
     * @test read
     */
    public function test_read_financing()
    {
        $financing = Financing::factory()->create();

        $dbFinancing = $this->financingRepo->find($financing->id);

        $dbFinancing = $dbFinancing->toArray();
        $this->assertModelData($financing->toArray(), $dbFinancing);
    }

    /**
     * @test update
     */
    public function test_update_financing()
    {
        $financing = Financing::factory()->create();
        $fakeFinancing = Financing::factory()->make()->toArray();

        $updatedFinancing = $this->financingRepo->update($fakeFinancing, $financing->id);

        $this->assertModelData($fakeFinancing, $updatedFinancing->toArray());
        $dbFinancing = $this->financingRepo->find($financing->id);
        $this->assertModelData($fakeFinancing, $dbFinancing->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_financing()
    {
        $financing = Financing::factory()->create();

        $resp = $this->financingRepo->delete($financing->id);

        $this->assertTrue($resp);
        $this->assertNull(Financing::find($financing->id), 'Financing should not exist in DB');
    }
}
