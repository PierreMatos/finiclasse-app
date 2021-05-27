<?php namespace Tests\Repositories;

use App\Models\Proposal;
use App\Repositories\ProposalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProposalRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProposalRepository
     */
    protected $proposalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->proposalRepo = \App::make(ProposalRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_proposal()
    {
        $proposal = Proposal::factory()->make()->toArray();

        $createdProposal = $this->proposalRepo->create($proposal);

        $createdProposal = $createdProposal->toArray();
        $this->assertArrayHasKey('id', $createdProposal);
        $this->assertNotNull($createdProposal['id'], 'Created Proposal must have id specified');
        $this->assertNotNull(Proposal::find($createdProposal['id']), 'Proposal with given id must be in DB');
        $this->assertModelData($proposal, $createdProposal);
    }

    /**
     * @test read
     */
    public function test_read_proposal()
    {
        $proposal = Proposal::factory()->create();

        $dbProposal = $this->proposalRepo->find($proposal->id);

        $dbProposal = $dbProposal->toArray();
        $this->assertModelData($proposal->toArray(), $dbProposal);
    }

    /**
     * @test update
     */
    public function test_update_proposal()
    {
        $proposal = Proposal::factory()->create();
        $fakeProposal = Proposal::factory()->make()->toArray();

        $updatedProposal = $this->proposalRepo->update($fakeProposal, $proposal->id);

        $this->assertModelData($fakeProposal, $updatedProposal->toArray());
        $dbProposal = $this->proposalRepo->find($proposal->id);
        $this->assertModelData($fakeProposal, $dbProposal->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_proposal()
    {
        $proposal = Proposal::factory()->create();

        $resp = $this->proposalRepo->delete($proposal->id);

        $this->assertTrue($resp);
        $this->assertNull(Proposal::find($proposal->id), 'Proposal should not exist in DB');
    }
}
