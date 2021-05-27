<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BenefitsBusinessStudy;

class BenefitsBusinessStudyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_benefits_business_study()
    {
        $benefitsBusinessStudy = BenefitsBusinessStudy::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/benefits_business_studies', $benefitsBusinessStudy
        );

        $this->assertApiResponse($benefitsBusinessStudy);
    }

    /**
     * @test
     */
    public function test_read_benefits_business_study()
    {
        $benefitsBusinessStudy = BenefitsBusinessStudy::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/benefits_business_studies/'.$benefitsBusinessStudy->id
        );

        $this->assertApiResponse($benefitsBusinessStudy->toArray());
    }

    /**
     * @test
     */
    public function test_update_benefits_business_study()
    {
        $benefitsBusinessStudy = BenefitsBusinessStudy::factory()->create();
        $editedBenefitsBusinessStudy = BenefitsBusinessStudy::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/benefits_business_studies/'.$benefitsBusinessStudy->id,
            $editedBenefitsBusinessStudy
        );

        $this->assertApiResponse($editedBenefitsBusinessStudy);
    }

    /**
     * @test
     */
    public function test_delete_benefits_business_study()
    {
        $benefitsBusinessStudy = BenefitsBusinessStudy::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/benefits_business_studies/'.$benefitsBusinessStudy->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/benefits_business_studies/'.$benefitsBusinessStudy->id
        );

        $this->response->assertStatus(404);
    }
}
