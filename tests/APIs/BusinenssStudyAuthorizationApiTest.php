<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BusinenssStudyAuthorization;

class BusinenssStudyAuthorizationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_businenss_study_authorization()
    {
        $businenssStudyAuthorization = BusinenssStudyAuthorization::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/businenss_study_authorizations', $businenssStudyAuthorization
        );

        $this->assertApiResponse($businenssStudyAuthorization);
    }

    /**
     * @test
     */
    public function test_read_businenss_study_authorization()
    {
        $businenssStudyAuthorization = BusinenssStudyAuthorization::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/businenss_study_authorizations/'.$businenssStudyAuthorization->id
        );

        $this->assertApiResponse($businenssStudyAuthorization->toArray());
    }

    /**
     * @test
     */
    public function test_update_businenss_study_authorization()
    {
        $businenssStudyAuthorization = BusinenssStudyAuthorization::factory()->create();
        $editedBusinenssStudyAuthorization = BusinenssStudyAuthorization::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/businenss_study_authorizations/'.$businenssStudyAuthorization->id,
            $editedBusinenssStudyAuthorization
        );

        $this->assertApiResponse($editedBusinenssStudyAuthorization);
    }

    /**
     * @test
     */
    public function test_delete_businenss_study_authorization()
    {
        $businenssStudyAuthorization = BusinenssStudyAuthorization::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/businenss_study_authorizations/'.$businenssStudyAuthorization->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/businenss_study_authorizations/'.$businenssStudyAuthorization->id
        );

        $this->response->assertStatus(404);
    }
}
