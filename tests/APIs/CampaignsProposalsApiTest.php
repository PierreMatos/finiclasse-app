<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CampaignsProposals;

class CampaignsProposalsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_campaigns_proposals()
    {
        $campaignsProposals = CampaignsProposals::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/campaigns_proposals', $campaignsProposals
        );

        $this->assertApiResponse($campaignsProposals);
    }

    /**
     * @test
     */
    public function test_read_campaigns_proposals()
    {
        $campaignsProposals = CampaignsProposals::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/campaigns_proposals/'.$campaignsProposals->id
        );

        $this->assertApiResponse($campaignsProposals->toArray());
    }

    /**
     * @test
     */
    public function test_update_campaigns_proposals()
    {
        $campaignsProposals = CampaignsProposals::factory()->create();
        $editedCampaignsProposals = CampaignsProposals::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/campaigns_proposals/'.$campaignsProposals->id,
            $editedCampaignsProposals
        );

        $this->assertApiResponse($editedCampaignsProposals);
    }

    /**
     * @test
     */
    public function test_delete_campaigns_proposals()
    {
        $campaignsProposals = CampaignsProposals::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/campaigns_proposals/'.$campaignsProposals->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/campaigns_proposals/'.$campaignsProposals->id
        );

        $this->response->assertStatus(404);
    }
}
