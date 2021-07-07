<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Campaign;

class CampaignApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_campaign()
    {
        $campaign = Campaign::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/campaigns', $campaign
        );

        $this->assertApiResponse($campaign);
    }

    /**
     * @test
     */
    public function test_read_campaign()
    {
        $campaign = Campaign::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/campaigns/'.$campaign->id
        );

        $this->assertApiResponse($campaign->toArray());
    }

    /**
     * @test
     */
    public function test_update_campaign()
    {
        $campaign = Campaign::factory()->create();
        $editedCampaign = Campaign::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/campaigns/'.$campaign->id,
            $editedCampaign
        );

        $this->assertApiResponse($editedCampaign);
    }

    /**
     * @test
     */
    public function test_delete_campaign()
    {
        $campaign = Campaign::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/campaigns/'.$campaign->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/campaigns/'.$campaign->id
        );

        $this->response->assertStatus(404);
    }
}
