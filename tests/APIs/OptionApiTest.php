<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Option;

class OptionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_option()
    {
        $option = factory(Option::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/options', $option
        );

        $this->assertApiResponse($option);
    }

    /**
     * @test
     */
    public function test_read_option()
    {
        $option = factory(Option::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/options/'.$option->id
        );

        $this->assertApiResponse($option->toArray());
    }

    /**
     * @test
     */
    public function test_update_option()
    {
        $option = factory(Option::class)->create();
        $editedOption = factory(Option::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/options/'.$option->id,
            $editedOption
        );

        $this->assertApiResponse($editedOption);
    }

    /**
     * @test
     */
    public function test_delete_option()
    {
        $option = factory(Option::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/options/'.$option->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/options/'.$option->id
        );

        $this->response->assertStatus(404);
    }
}
