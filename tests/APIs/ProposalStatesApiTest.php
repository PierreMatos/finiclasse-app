<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProposalStates;

class ProposalStatesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_proposal_states()
    {
        $proposalStates = ProposalStates::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/proposal_states', $proposalStates
        );

        $this->assertApiResponse($proposalStates);
    }

    /**
     * @test
     */
    public function test_read_proposal_states()
    {
        $proposalStates = ProposalStates::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/proposal_states/'.$proposalStates->id
        );

        $this->assertApiResponse($proposalStates->toArray());
    }

    /**
     * @test
     */
    public function test_update_proposal_states()
    {
        $proposalStates = ProposalStates::factory()->create();
        $editedProposalStates = ProposalStates::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/proposal_states/'.$proposalStates->id,
            $editedProposalStates
        );

        $this->assertApiResponse($editedProposalStates);
    }

    /**
     * @test
     */
    public function test_delete_proposal_states()
    {
        $proposalStates = ProposalStates::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/proposal_states/'.$proposalStates->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/proposal_states/'.$proposalStates->id
        );

        $this->response->assertStatus(404);
    }
}
