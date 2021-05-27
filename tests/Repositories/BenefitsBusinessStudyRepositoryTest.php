<?php namespace Tests\Repositories;

use App\Models\BenefitsBusinessStudy;
use App\Repositories\BenefitsBusinessStudyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BenefitsBusinessStudyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BenefitsBusinessStudyRepository
     */
    protected $benefitsBusinessStudyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->benefitsBusinessStudyRepo = \App::make(BenefitsBusinessStudyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_benefits_business_study()
    {
        $benefitsBusinessStudy = BenefitsBusinessStudy::factory()->make()->toArray();

        $createdBenefitsBusinessStudy = $this->benefitsBusinessStudyRepo->create($benefitsBusinessStudy);

        $createdBenefitsBusinessStudy = $createdBenefitsBusinessStudy->toArray();
        $this->assertArrayHasKey('id', $createdBenefitsBusinessStudy);
        $this->assertNotNull($createdBenefitsBusinessStudy['id'], 'Created BenefitsBusinessStudy must have id specified');
        $this->assertNotNull(BenefitsBusinessStudy::find($createdBenefitsBusinessStudy['id']), 'BenefitsBusinessStudy with given id must be in DB');
        $this->assertModelData($benefitsBusinessStudy, $createdBenefitsBusinessStudy);
    }

    /**
     * @test read
     */
    public function test_read_benefits_business_study()
    {
        $benefitsBusinessStudy = BenefitsBusinessStudy::factory()->create();

        $dbBenefitsBusinessStudy = $this->benefitsBusinessStudyRepo->find($benefitsBusinessStudy->id);

        $dbBenefitsBusinessStudy = $dbBenefitsBusinessStudy->toArray();
        $this->assertModelData($benefitsBusinessStudy->toArray(), $dbBenefitsBusinessStudy);
    }

    /**
     * @test update
     */
    public function test_update_benefits_business_study()
    {
        $benefitsBusinessStudy = BenefitsBusinessStudy::factory()->create();
        $fakeBenefitsBusinessStudy = BenefitsBusinessStudy::factory()->make()->toArray();

        $updatedBenefitsBusinessStudy = $this->benefitsBusinessStudyRepo->update($fakeBenefitsBusinessStudy, $benefitsBusinessStudy->id);

        $this->assertModelData($fakeBenefitsBusinessStudy, $updatedBenefitsBusinessStudy->toArray());
        $dbBenefitsBusinessStudy = $this->benefitsBusinessStudyRepo->find($benefitsBusinessStudy->id);
        $this->assertModelData($fakeBenefitsBusinessStudy, $dbBenefitsBusinessStudy->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_benefits_business_study()
    {
        $benefitsBusinessStudy = BenefitsBusinessStudy::factory()->create();

        $resp = $this->benefitsBusinessStudyRepo->delete($benefitsBusinessStudy->id);

        $this->assertTrue($resp);
        $this->assertNull(BenefitsBusinessStudy::find($benefitsBusinessStudy->id), 'BenefitsBusinessStudy should not exist in DB');
    }
}
