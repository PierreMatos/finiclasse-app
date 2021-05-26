<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Make;

class MakeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_make()
    {
        $make = Make::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/makes', $make
        );

        $this->assertApiResponse($make);
    }

    /**
     * @test
     */
    public function test_read_make()
    {
        $make = Make::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/makes/'.$make->id
        );

        $this->assertApiResponse($make->toArray());
    }

    /**
     * @test
     */
    public function test_update_make()
    {
        $make = Make::factory()->create();
        $editedMake = Make::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/makes/'.$make->id,
            $editedMake
        );

        $this->assertApiResponse($editedMake);
    }

    /**
     * @test
     */
    public function test_delete_make()
    {
        $make = Make::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/makes/'.$make->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/makes/'.$make->id
        );

        $this->response->assertStatus(404);
    }
}
