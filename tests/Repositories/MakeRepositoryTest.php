<?php namespace Tests\Repositories;

use App\Models\Make;
use App\Repositories\MakeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MakeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MakeRepository
     */
    protected $makeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->makeRepo = \App::make(MakeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_make()
    {
        $make = Make::factory()->make()->toArray();

        $createdMake = $this->makeRepo->create($make);

        $createdMake = $createdMake->toArray();
        $this->assertArrayHasKey('id', $createdMake);
        $this->assertNotNull($createdMake['id'], 'Created Make must have id specified');
        $this->assertNotNull(Make::find($createdMake['id']), 'Make with given id must be in DB');
        $this->assertModelData($make, $createdMake);
    }

    /**
     * @test read
     */
    public function test_read_make()
    {
        $make = Make::factory()->create();

        $dbMake = $this->makeRepo->find($make->id);

        $dbMake = $dbMake->toArray();
        $this->assertModelData($make->toArray(), $dbMake);
    }

    /**
     * @test update
     */
    public function test_update_make()
    {
        $make = Make::factory()->create();
        $fakeMake = Make::factory()->make()->toArray();

        $updatedMake = $this->makeRepo->update($fakeMake, $make->id);

        $this->assertModelData($fakeMake, $updatedMake->toArray());
        $dbMake = $this->makeRepo->find($make->id);
        $this->assertModelData($fakeMake, $dbMake->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_make()
    {
        $make = Make::factory()->create();

        $resp = $this->makeRepo->delete($make->id);

        $this->assertTrue($resp);
        $this->assertNull(Make::find($make->id), 'Make should not exist in DB');
    }
}
