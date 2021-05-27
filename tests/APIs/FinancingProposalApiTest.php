<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FinancingProposal;

class FinancingProposalApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_financing_proposal()
    {
        $financingProposal = FinancingProposal::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/financing_proposals', $financingProposal
        );

        $this->assertApiResponse($financingProposal);
    }

    /**
     * @test
     */
    public function test_read_financing_proposal()
    {
        $financingProposal = FinancingProposal::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/financing_proposals/'.$financingProposal->id
        );

        $this->assertApiResponse($financingProposal->toArray());
    }

    /**
     * @test
     */
    public function test_update_financing_proposal()
    {
        $financingProposal = FinancingProposal::factory()->create();
        $editedFinancingProposal = FinancingProposal::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/financing_proposals/'.$financingProposal->id,
            $editedFinancingProposal
        );

        $this->assertApiResponse($editedFinancingProposal);
    }

    /**
     * @test
     */
    public function test_delete_financing_proposal()
    {
        $financingProposal = FinancingProposal::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/financing_proposals/'.$financingProposal->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/financing_proposals/'.$financingProposal->id
        );

        $this->response->assertStatus(404);
    }
}
