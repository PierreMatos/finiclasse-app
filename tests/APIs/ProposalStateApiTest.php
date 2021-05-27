<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProposalState;

class ProposalStateApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_proposal_state()
    {
        $proposalState = ProposalState::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/proposal_states', $proposalState
        );

        $this->assertApiResponse($proposalState);
    }

    /**
     * @test
     */
    public function test_read_proposal_state()
    {
        $proposalState = ProposalState::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/proposal_states/'.$proposalState->id
        );

        $this->assertApiResponse($proposalState->toArray());
    }

    /**
     * @test
     */
    public function test_update_proposal_state()
    {
        $proposalState = ProposalState::factory()->create();
        $editedProposalState = ProposalState::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/proposal_states/'.$proposalState->id,
            $editedProposalState
        );

        $this->assertApiResponse($editedProposalState);
    }

    /**
     * @test
     */
    public function test_delete_proposal_state()
    {
        $proposalState = ProposalState::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/proposal_states/'.$proposalState->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/proposal_states/'.$proposalState->id
        );

        $this->response->assertStatus(404);
    }
}
