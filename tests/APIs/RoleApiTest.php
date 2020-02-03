<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Role;

class RoleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_role()
    {
        $role = factory(Role::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/roles', $role
        );

        $this->assertApiResponse($role);
    }

    /**
     * @test
     */
    public function test_read_role()
    {
        $role = factory(Role::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/roles/'.$role->id
        );

        $this->assertApiResponse($role->toArray());
    }

    /**
     * @test
     */
    public function test_update_role()
    {
        $role = factory(Role::class)->create();
        $editedRole = factory(Role::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/roles/'.$role->id,
            $editedRole
        );

        $this->assertApiResponse($editedRole);
    }

    /**
     * @test
     */
    public function test_delete_role()
    {
        $role = factory(Role::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/roles/'.$role->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/roles/'.$role->id
        );

        $this->response->assertStatus(404);
    }
}
