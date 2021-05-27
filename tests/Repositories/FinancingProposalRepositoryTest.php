<?php namespace Tests\Repositories;

use App\Models\FinancingProposal;
use App\Repositories\FinancingProposalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FinancingProposalRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FinancingProposalRepository
     */
    protected $financingProposalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->financingProposalRepo = \App::make(FinancingProposalRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_financing_proposal()
    {
        $financingProposal = FinancingProposal::factory()->make()->toArray();

        $createdFinancingProposal = $this->financingProposalRepo->create($financingProposal);

        $createdFinancingProposal = $createdFinancingProposal->toArray();
        $this->assertArrayHasKey('id', $createdFinancingProposal);
        $this->assertNotNull($createdFinancingProposal['id'], 'Created FinancingProposal must have id specified');
        $this->assertNotNull(FinancingProposal::find($createdFinancingProposal['id']), 'FinancingProposal with given id must be in DB');
        $this->assertModelData($financingProposal, $createdFinancingProposal);
    }

    /**
     * @test read
     */
    public function test_read_financing_proposal()
    {
        $financingProposal = FinancingProposal::factory()->create();

        $dbFinancingProposal = $this->financingProposalRepo->find($financingProposal->id);

        $dbFinancingProposal = $dbFinancingProposal->toArray();
        $this->assertModelData($financingProposal->toArray(), $dbFinancingProposal);
    }

    /**
     * @test update
     */
    public function test_update_financing_proposal()
    {
        $financingProposal = FinancingProposal::factory()->create();
        $fakeFinancingProposal = FinancingProposal::factory()->make()->toArray();

        $updatedFinancingProposal = $this->financingProposalRepo->update($fakeFinancingProposal, $financingProposal->id);

        $this->assertModelData($fakeFinancingProposal, $updatedFinancingProposal->toArray());
        $dbFinancingProposal = $this->financingProposalRepo->find($financingProposal->id);
        $this->assertModelData($fakeFinancingProposal, $dbFinancingProposal->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_financing_proposal()
    {
        $financingProposal = FinancingProposal::factory()->create();

        $resp = $this->financingProposalRepo->delete($financingProposal->id);

        $this->assertTrue($resp);
        $this->assertNull(FinancingProposal::find($financingProposal->id), 'FinancingProposal should not exist in DB');
    }
}
