<?php namespace Tests\Repositories;

use App\Models\ProposalState;
use App\Repositories\ProposalStateRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProposalStateRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProposalStateRepository
     */
    protected $proposalStateRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->proposalStateRepo = \App::make(ProposalStateRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_proposal_state()
    {
        $proposalState = ProposalState::factory()->make()->toArray();

        $createdProposalState = $this->proposalStateRepo->create($proposalState);

        $createdProposalState = $createdProposalState->toArray();
        $this->assertArrayHasKey('id', $createdProposalState);
        $this->assertNotNull($createdProposalState['id'], 'Created ProposalState must have id specified');
        $this->assertNotNull(ProposalState::find($createdProposalState['id']), 'ProposalState with given id must be in DB');
        $this->assertModelData($proposalState, $createdProposalState);
    }

    /**
     * @test read
     */
    public function test_read_proposal_state()
    {
        $proposalState = ProposalState::factory()->create();

        $dbProposalState = $this->proposalStateRepo->find($proposalState->id);

        $dbProposalState = $dbProposalState->toArray();
        $this->assertModelData($proposalState->toArray(), $dbProposalState);
    }

    /**
     * @test update
     */
    public function test_update_proposal_state()
    {
        $proposalState = ProposalState::factory()->create();
        $fakeProposalState = ProposalState::factory()->make()->toArray();

        $updatedProposalState = $this->proposalStateRepo->update($fakeProposalState, $proposalState->id);

        $this->assertModelData($fakeProposalState, $updatedProposalState->toArray());
        $dbProposalState = $this->proposalStateRepo->find($proposalState->id);
        $this->assertModelData($fakeProposalState, $dbProposalState->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_proposal_state()
    {
        $proposalState = ProposalState::factory()->create();

        $resp = $this->proposalStateRepo->delete($proposalState->id);

        $this->assertTrue($resp);
        $this->assertNull(ProposalState::find($proposalState->id), 'ProposalState should not exist in DB');
    }
}
