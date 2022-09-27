<?php namespace Tests\Repositories;

use App\Models\ProfitMargin;
use App\Repositories\ProfitMarginRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProfitMarginRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProfitMarginRepository
     */
    protected $profitMarginRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->profitMarginRepo = \App::make(ProfitMarginRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_profit_margin()
    {
        $profitMargin = ProfitMargin::factory()->make()->toArray();

        $createdProfitMargin = $this->profitMarginRepo->create($profitMargin);

        $createdProfitMargin = $createdProfitMargin->toArray();
        $this->assertArrayHasKey('id', $createdProfitMargin);
        $this->assertNotNull($createdProfitMargin['id'], 'Created ProfitMargin must have id specified');
        $this->assertNotNull(ProfitMargin::find($createdProfitMargin['id']), 'ProfitMargin with given id must be in DB');
        $this->assertModelData($profitMargin, $createdProfitMargin);
    }

    /**
     * @test read
     */
    public function test_read_profit_margin()
    {
        $profitMargin = ProfitMargin::factory()->create();

        $dbProfitMargin = $this->profitMarginRepo->find($profitMargin->id);

        $dbProfitMargin = $dbProfitMargin->toArray();
        $this->assertModelData($profitMargin->toArray(), $dbProfitMargin);
    }

    /**
     * @test update
     */
    public function test_update_profit_margin()
    {
        $profitMargin = ProfitMargin::factory()->create();
        $fakeProfitMargin = ProfitMargin::factory()->make()->toArray();

        $updatedProfitMargin = $this->profitMarginRepo->update($fakeProfitMargin, $profitMargin->id);

        $this->assertModelData($fakeProfitMargin, $updatedProfitMargin->toArray());
        $dbProfitMargin = $this->profitMarginRepo->find($profitMargin->id);
        $this->assertModelData($fakeProfitMargin, $dbProfitMargin->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_profit_margin()
    {
        $profitMargin = ProfitMargin::factory()->create();

        $resp = $this->profitMarginRepo->delete($profitMargin->id);

        $this->assertTrue($resp);
        $this->assertNull(ProfitMargin::find($profitMargin->id), 'ProfitMargin should not exist in DB');
    }
}
