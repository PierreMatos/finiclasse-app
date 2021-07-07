<?php namespace Tests\Repositories;

use App\Models\Campaign;
use App\Repositories\CampaignRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CampaignRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CampaignRepository
     */
    protected $campaignRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->campaignRepo = \App::make(CampaignRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_campaign()
    {
        $campaign = Campaign::factory()->make()->toArray();

        $createdCampaign = $this->campaignRepo->create($campaign);

        $createdCampaign = $createdCampaign->toArray();
        $this->assertArrayHasKey('id', $createdCampaign);
        $this->assertNotNull($createdCampaign['id'], 'Created Campaign must have id specified');
        $this->assertNotNull(Campaign::find($createdCampaign['id']), 'Campaign with given id must be in DB');
        $this->assertModelData($campaign, $createdCampaign);
    }

    /**
     * @test read
     */
    public function test_read_campaign()
    {
        $campaign = Campaign::factory()->create();

        $dbCampaign = $this->campaignRepo->find($campaign->id);

        $dbCampaign = $dbCampaign->toArray();
        $this->assertModelData($campaign->toArray(), $dbCampaign);
    }

    /**
     * @test update
     */
    public function test_update_campaign()
    {
        $campaign = Campaign::factory()->create();
        $fakeCampaign = Campaign::factory()->make()->toArray();

        $updatedCampaign = $this->campaignRepo->update($fakeCampaign, $campaign->id);

        $this->assertModelData($fakeCampaign, $updatedCampaign->toArray());
        $dbCampaign = $this->campaignRepo->find($campaign->id);
        $this->assertModelData($fakeCampaign, $dbCampaign->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_campaign()
    {
        $campaign = Campaign::factory()->create();

        $resp = $this->campaignRepo->delete($campaign->id);

        $this->assertTrue($resp);
        $this->assertNull(Campaign::find($campaign->id), 'Campaign should not exist in DB');
    }
}
