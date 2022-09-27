<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProfitMargin;

class ProfitMarginApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_profit_margin()
    {
        $profitMargin = ProfitMargin::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/profit_margins', $profitMargin
        );

        $this->assertApiResponse($profitMargin);
    }

    /**
     * @test
     */
    public function test_read_profit_margin()
    {
        $profitMargin = ProfitMargin::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/profit_margins/'.$profitMargin->id
        );

        $this->assertApiResponse($profitMargin->toArray());
    }

    /**
     * @test
     */
    public function test_update_profit_margin()
    {
        $profitMargin = ProfitMargin::factory()->create();
        $editedProfitMargin = ProfitMargin::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/profit_margins/'.$profitMargin->id,
            $editedProfitMargin
        );

        $this->assertApiResponse($editedProfitMargin);
    }

    /**
     * @test
     */
    public function test_delete_profit_margin()
    {
        $profitMargin = ProfitMargin::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/profit_margins/'.$profitMargin->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/profit_margins/'.$profitMargin->id
        );

        $this->response->assertStatus(404);
    }
}
