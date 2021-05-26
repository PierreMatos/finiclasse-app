<?php namespace Tests\Repositories;

use App\Models\Stand;
use App\Repositories\StandRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StandRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StandRepository
     */
    protected $standRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->standRepo = \App::make(StandRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stand()
    {
        $stand = Stand::factory()->make()->toArray();

        $createdStand = $this->standRepo->create($stand);

        $createdStand = $createdStand->toArray();
        $this->assertArrayHasKey('id', $createdStand);
        $this->assertNotNull($createdStand['id'], 'Created Stand must have id specified');
        $this->assertNotNull(Stand::find($createdStand['id']), 'Stand with given id must be in DB');
        $this->assertModelData($stand, $createdStand);
    }

    /**
     * @test read
     */
    public function test_read_stand()
    {
        $stand = Stand::factory()->create();

        $dbStand = $this->standRepo->find($stand->id);

        $dbStand = $dbStand->toArray();
        $this->assertModelData($stand->toArray(), $dbStand);
    }

    /**
     * @test update
     */
    public function test_update_stand()
    {
        $stand = Stand::factory()->create();
        $fakeStand = Stand::factory()->make()->toArray();

        $updatedStand = $this->standRepo->update($fakeStand, $stand->id);

        $this->assertModelData($fakeStand, $updatedStand->toArray());
        $dbStand = $this->standRepo->find($stand->id);
        $this->assertModelData($fakeStand, $dbStand->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stand()
    {
        $stand = Stand::factory()->create();

        $resp = $this->standRepo->delete($stand->id);

        $this->assertTrue($resp);
        $this->assertNull(Stand::find($stand->id), 'Stand should not exist in DB');
    }
}
