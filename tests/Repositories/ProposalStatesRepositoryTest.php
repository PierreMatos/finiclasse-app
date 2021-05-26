<?php namespace Tests\Repositories;

use App\Models\ProposalStates;
use App\Repositories\ProposalStatesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProposalStatesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProposalStatesRepository
     */
    protected $proposalStatesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->proposalStatesRepo = \App::make(ProposalStatesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_proposal_states()
    {
        $proposalStates = ProposalStates::factory()->make()->toArray();

        $createdProposalStates = $this->proposalStatesRepo->create($proposalStates);

        $createdProposalStates = $createdProposalStates->toArray();
        $this->assertArrayHasKey('id', $createdProposalStates);
        $this->assertNotNull($createdProposalStates['id'], 'Created ProposalStates must have id specified');
        $this->assertNotNull(ProposalStates::find($createdProposalStates['id']), 'ProposalStates with given id must be in DB');
        $this->assertModelData($proposalStates, $createdProposalStates);
    }

    /**
     * @test read
     */
    public function test_read_proposal_states()
    {
        $proposalStates = ProposalStates::factory()->create();

        $dbProposalStates = $this->proposalStatesRepo->find($proposalStates->id);

        $dbProposalStates = $dbProposalStates->toArray();
        $this->assertModelData($proposalStates->toArray(), $dbProposalStates);
    }

    /**
     * @test update
     */
    public function test_update_proposal_states()
    {
        $proposalStates = ProposalStates::factory()->create();
        $fakeProposalStates = ProposalStates::factory()->make()->toArray();

        $updatedProposalStates = $this->proposalStatesRepo->update($fakeProposalStates, $proposalStates->id);

        $this->assertModelData($fakeProposalStates, $updatedProposalStates->toArray());
        $dbProposalStates = $this->proposalStatesRepo->find($proposalStates->id);
        $this->assertModelData($fakeProposalStates, $dbProposalStates->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_proposal_states()
    {
        $proposalStates = ProposalStates::factory()->create();

        $resp = $this->proposalStatesRepo->delete($proposalStates->id);

        $this->assertTrue($resp);
        $this->assertNull(ProposalStates::find($proposalStates->id), 'ProposalStates should not exist in DB');
    }
}
