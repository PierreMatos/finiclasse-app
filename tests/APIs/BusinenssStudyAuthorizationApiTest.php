<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BusinessStudyAuthorization;

class BusinessStudyAuthorizationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_businenss_study_authorization()
    {
        $BusinessStudyAuthorization = BusinessStudyAuthorization::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/businenss_study_authorizations', $BusinessStudyAuthorization
        );

        $this->assertApiResponse($BusinessStudyAuthorization);
    }

    /**
     * @test
     */
    public function test_read_businenss_study_authorization()
    {
        $BusinessStudyAuthorization = BusinessStudyAuthorization::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/businenss_study_authorizations/'.$BusinessStudyAuthorization->id
        );

        $this->assertApiResponse($BusinessStudyAuthorization->toArray());
    }

    /**
     * @test
     */
    public function test_update_businenss_study_authorization()
    {
        $BusinessStudyAuthorization = BusinessStudyAuthorization::factory()->create();
        $editedBusinessStudyAuthorization = BusinessStudyAuthorization::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/businenss_study_authorizations/'.$BusinessStudyAuthorization->id,
            $editedBusinessStudyAuthorization
        );

        $this->assertApiResponse($editedBusinessStudyAuthorization);
    }

    /**
     * @test
     */
    public function test_delete_businenss_study_authorization()
    {
        $BusinessStudyAuthorization = BusinessStudyAuthorization::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/businenss_study_authorizations/'.$BusinessStudyAuthorization->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/businenss_study_authorizations/'.$BusinessStudyAuthorization->id
        );

        $this->response->assertStatus(404);
    }
}
