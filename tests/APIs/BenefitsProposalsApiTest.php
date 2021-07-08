<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BenefitsProposals;

class BenefitsProposalsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_benefits_proposals()
    {
        $benefitsProposals = BenefitsProposals::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/benefits_proposals', $benefitsProposals
        );

        $this->assertApiResponse($benefitsProposals);
    }

    /**
     * @test
     */
    public function test_read_benefits_proposals()
    {
        $benefitsProposals = BenefitsProposals::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/benefits_proposals/'.$benefitsProposals->id
        );

        $this->assertApiResponse($benefitsProposals->toArray());
    }

    /**
     * @test
     */
    public function test_update_benefits_proposals()
    {
        $benefitsProposals = BenefitsProposals::factory()->create();
        $editedBenefitsProposals = BenefitsProposals::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/benefits_proposals/'.$benefitsProposals->id,
            $editedBenefitsProposals
        );

        $this->assertApiResponse($editedBenefitsProposals);
    }

    /**
     * @test
     */
    public function test_delete_benefits_proposals()
    {
        $benefitsProposals = BenefitsProposals::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/benefits_proposals/'.$benefitsProposals->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/benefits_proposals/'.$benefitsProposals->id
        );

        $this->response->assertStatus(404);
    }
}
