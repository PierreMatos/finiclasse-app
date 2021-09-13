<?php namespace Tests\Repositories;

use App\Models\TradeinState;
use App\Repositories\TradeinStateRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TradeinStateRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TradeinStateRepository
     */
    protected $tradeinStateRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tradeinStateRepo = \App::make(TradeinStateRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tradein_state()
    {
        $tradeinState = TradeinState::factory()->make()->toArray();

        $createdTradeinState = $this->tradeinStateRepo->create($tradeinState);

        $createdTradeinState = $createdTradeinState->toArray();
        $this->assertArrayHasKey('id', $createdTradeinState);
        $this->assertNotNull($createdTradeinState['id'], 'Created TradeinState must have id specified');
        $this->assertNotNull(TradeinState::find($createdTradeinState['id']), 'TradeinState with given id must be in DB');
        $this->assertModelData($tradeinState, $createdTradeinState);
    }

    /**
     * @test read
     */
    public function test_read_tradein_state()
    {
        $tradeinState = TradeinState::factory()->create();

        $dbTradeinState = $this->tradeinStateRepo->find($tradeinState->id);

        $dbTradeinState = $dbTradeinState->toArray();
        $this->assertModelData($tradeinState->toArray(), $dbTradeinState);
    }

    /**
     * @test update
     */
    public function test_update_tradein_state()
    {
        $tradeinState = TradeinState::factory()->create();
        $fakeTradeinState = TradeinState::factory()->make()->toArray();

        $updatedTradeinState = $this->tradeinStateRepo->update($fakeTradeinState, $tradeinState->id);

        $this->assertModelData($fakeTradeinState, $updatedTradeinState->toArray());
        $dbTradeinState = $this->tradeinStateRepo->find($tradeinState->id);
        $this->assertModelData($fakeTradeinState, $dbTradeinState->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tradein_state()
    {
        $tradeinState = TradeinState::factory()->create();

        $resp = $this->tradeinStateRepo->delete($tradeinState->id);

        $this->assertTrue($resp);
        $this->assertNull(TradeinState::find($tradeinState->id), 'TradeinState should not exist in DB');
    }
}
