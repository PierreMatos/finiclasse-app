<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BusinessStudyStates;

class BusinessStudyStatesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_business_study_states()
    {
        $businessStudyStates = BusinessStudyStates::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/business_study_states', $businessStudyStates
        );

        $this->assertApiResponse($businessStudyStates);
    }

    /**
     * @test
     */
    public function test_read_business_study_states()
    {
        $businessStudyStates = BusinessStudyStates::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/business_study_states/'.$businessStudyStates->id
        );

        $this->assertApiResponse($businessStudyStates->toArray());
    }

    /**
     * @test
     */
    public function test_update_business_study_states()
    {
        $businessStudyStates = BusinessStudyStates::factory()->create();
        $editedBusinessStudyStates = BusinessStudyStates::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/business_study_states/'.$businessStudyStates->id,
            $editedBusinessStudyStates
        );

        $this->assertApiResponse($editedBusinessStudyStates);
    }

    /**
     * @test
     */
    public function test_delete_business_study_states()
    {
        $businessStudyStates = BusinessStudyStates::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/business_study_states/'.$businessStudyStates->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/business_study_states/'.$businessStudyStates->id
        );

        $this->response->assertStatus(404);
    }
}
