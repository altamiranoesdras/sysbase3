<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Permission;

class PermissionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_permission()
    {
        $permission = factory(Permission::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/permissions', $permission
        );

        $this->assertApiResponse($permission);
    }

    /**
     * @test
     */
    public function test_read_permission()
    {
        $permission = factory(Permission::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/permissions/'.$permission->id
        );

        $this->assertApiResponse($permission->toArray());
    }

    /**
     * @test
     */
    public function test_update_permission()
    {
        $permission = factory(Permission::class)->create();
        $editedPermission = factory(Permission::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/permissions/'.$permission->id,
            $editedPermission
        );

        $this->assertApiResponse($editedPermission);
    }

    /**
     * @test
     */
    public function test_delete_permission()
    {
        $permission = factory(Permission::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/permissions/'.$permission->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/permissions/'.$permission->id
        );

        $this->response->assertStatus(404);
    }
}
