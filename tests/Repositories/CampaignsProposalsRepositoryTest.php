<?php namespace Tests\Repositories;

use App\Models\CampaignsProposals;
use App\Repositories\CampaignsProposalsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CampaignsProposalsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CampaignsProposalsRepository
     */
    protected $campaignsProposalsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->campaignsProposalsRepo = \App::make(CampaignsProposalsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_campaigns_proposals()
    {
        $campaignsProposals = CampaignsProposals::factory()->make()->toArray();

        $createdCampaignsProposals = $this->campaignsProposalsRepo->create($campaignsProposals);

        $createdCampaignsProposals = $createdCampaignsProposals->toArray();
        $this->assertArrayHasKey('id', $createdCampaignsProposals);
        $this->assertNotNull($createdCampaignsProposals['id'], 'Created CampaignsProposals must have id specified');
        $this->assertNotNull(CampaignsProposals::find($createdCampaignsProposals['id']), 'CampaignsProposals with given id must be in DB');
        $this->assertModelData($campaignsProposals, $createdCampaignsProposals);
    }

    /**
     * @test read
     */
    public function test_read_campaigns_proposals()
    {
        $campaignsProposals = CampaignsProposals::factory()->create();

        $dbCampaignsProposals = $this->campaignsProposalsRepo->find($campaignsProposals->id);

        $dbCampaignsProposals = $dbCampaignsProposals->toArray();
        $this->assertModelData($campaignsProposals->toArray(), $dbCampaignsProposals);
    }

    /**
     * @test update
     */
    public function test_update_campaigns_proposals()
    {
        $campaignsProposals = CampaignsProposals::factory()->create();
        $fakeCampaignsProposals = CampaignsProposals::factory()->make()->toArray();

        $updatedCampaignsProposals = $this->campaignsProposalsRepo->update($fakeCampaignsProposals, $campaignsProposals->id);

        $this->assertModelData($fakeCampaignsProposals, $updatedCampaignsProposals->toArray());
        $dbCampaignsProposals = $this->campaignsProposalsRepo->find($campaignsProposals->id);
        $this->assertModelData($fakeCampaignsProposals, $dbCampaignsProposals->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_campaigns_proposals()
    {
        $campaignsProposals = CampaignsProposals::factory()->create();

        $resp = $this->campaignsProposalsRepo->delete($campaignsProposals->id);

        $this->assertTrue($resp);
        $this->assertNull(CampaignsProposals::find($campaignsProposals->id), 'CampaignsProposals should not exist in DB');
    }
}
