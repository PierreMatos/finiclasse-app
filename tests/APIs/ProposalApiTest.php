<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Proposal;

class ProposalApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_proposal()
    {
        $proposal = Proposal::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/proposals', $proposal
        );

        $this->assertApiResponse($proposal);
    }

    /**
     * @test
     */
    public function test_read_proposal()
    {
        $proposal = Proposal::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/proposals/'.$proposal->id
        );

        $this->assertApiResponse($proposal->toArray());
    }

    /**
     * @test
     */
    public function test_update_proposal()
    {
        $proposal = Proposal::factory()->create();
        $editedProposal = Proposal::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/proposals/'.$proposal->id,
            $editedProposal
        );

        $this->assertApiResponse($editedProposal);
    }

    /**
     * @test
     */
    public function test_delete_proposal()
    {
        $proposal = Proposal::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/proposals/'.$proposal->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/proposals/'.$proposal->id
        );

        $this->response->assertStatus(404);
    }
}
