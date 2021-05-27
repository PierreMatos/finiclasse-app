<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BusinessStudy;

class BusinessStudyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_business_study()
    {
        $businessStudy = BusinessStudy::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/business_studies', $businessStudy
        );

        $this->assertApiResponse($businessStudy);
    }

    /**
     * @test
     */
    public function test_read_business_study()
    {
        $businessStudy = BusinessStudy::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/business_studies/'.$businessStudy->id
        );

        $this->assertApiResponse($businessStudy->toArray());
    }

    /**
     * @test
     */
    public function test_update_business_study()
    {
        $businessStudy = BusinessStudy::factory()->create();
        $editedBusinessStudy = BusinessStudy::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/business_studies/'.$businessStudy->id,
            $editedBusinessStudy
        );

        $this->assertApiResponse($editedBusinessStudy);
    }

    /**
     * @test
     */
    public function test_delete_business_study()
    {
        $businessStudy = BusinessStudy::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/business_studies/'.$businessStudy->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/business_studies/'.$businessStudy->id
        );

        $this->response->assertStatus(404);
    }
}
