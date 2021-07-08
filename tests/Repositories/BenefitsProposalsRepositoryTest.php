<?php namespace Tests\Repositories;

use App\Models\BenefitsProposals;
use App\Repositories\BenefitsProposalsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BenefitsProposalsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BenefitsProposalsRepository
     */
    protected $benefitsProposalsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->benefitsProposalsRepo = \App::make(BenefitsProposalsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_benefits_proposals()
    {
        $benefitsProposals = BenefitsProposals::factory()->make()->toArray();

        $createdBenefitsProposals = $this->benefitsProposalsRepo->create($benefitsProposals);

        $createdBenefitsProposals = $createdBenefitsProposals->toArray();
        $this->assertArrayHasKey('id', $createdBenefitsProposals);
        $this->assertNotNull($createdBenefitsProposals['id'], 'Created BenefitsProposals must have id specified');
        $this->assertNotNull(BenefitsProposals::find($createdBenefitsProposals['id']), 'BenefitsProposals with given id must be in DB');
        $this->assertModelData($benefitsProposals, $createdBenefitsProposals);
    }

    /**
     * @test read
     */
    public function test_read_benefits_proposals()
    {
        $benefitsProposals = BenefitsProposals::factory()->create();

        $dbBenefitsProposals = $this->benefitsProposalsRepo->find($benefitsProposals->id);

        $dbBenefitsProposals = $dbBenefitsProposals->toArray();
        $this->assertModelData($benefitsProposals->toArray(), $dbBenefitsProposals);
    }

    /**
     * @test update
     */
    public function test_update_benefits_proposals()
    {
        $benefitsProposals = BenefitsProposals::factory()->create();
        $fakeBenefitsProposals = BenefitsProposals::factory()->make()->toArray();

        $updatedBenefitsProposals = $this->benefitsProposalsRepo->update($fakeBenefitsProposals, $benefitsProposals->id);

        $this->assertModelData($fakeBenefitsProposals, $updatedBenefitsProposals->toArray());
        $dbBenefitsProposals = $this->benefitsProposalsRepo->find($benefitsProposals->id);
        $this->assertModelData($fakeBenefitsProposals, $dbBenefitsProposals->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_benefits_proposals()
    {
        $benefitsProposals = BenefitsProposals::factory()->create();

        $resp = $this->benefitsProposalsRepo->delete($benefitsProposals->id);

        $this->assertTrue($resp);
        $this->assertNull(BenefitsProposals::find($benefitsProposals->id), 'BenefitsProposals should not exist in DB');
    }
}
