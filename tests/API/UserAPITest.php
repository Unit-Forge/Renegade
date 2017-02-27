<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAPITest extends TestCase
{
    /**
     * @group users-api
     * Tests getting all users
     */
    public function testGetAllUsers()
    {
        // Create a Rank
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $user = \Renegade\Models\Access\User\User::create(['name' => 'William Smith', 'email' => 'test1@test.com', 'password' => bcrypt('1234')]);
        $this
            ->json('GET','api/users')
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'William Smith',
            ]);
    }

    /**
     * @group users-api
     * Tests creating a rank - no authentication
     */
    public function testCreatingUser()
    {
        $this
            ->json('POST','api/users',['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')])
            ->assertResponseStatus(201)
            ->seeJson([
                'name' => 'John Doe',
            ]);
    }

    /**
     * @group users-api
     * Tests getting a rank
     */
    public function testGetOneUser()
    {
        // Create a User
        $user = \Renegade\Models\Access\User\User::create(['name' => 'William Smith', 'email' => 'test1@test.com', 'password' => bcrypt('1234')]);
        $this
            ->json('GET','api/users/'.$user->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'William Smith',
            ]);
    }

    /**
     * @group users-api
     * Tests updating a rank
     */
    public function testUpdateUser()
    {
        // Create a User
        $user = \Renegade\Models\Access\User\User::create(['name' => 'William Smith', 'email' => 'test1@test.com', 'password' => bcrypt('1234')]);
        $this
            ->json('PUT','api/users/'.$user->id,['email' => 'test-edit@test.com'])
            ->assertResponseStatus(200)
            ->seeJson([
                'email' => 'test-edit@test.com',
            ]);
    }

    /**
     * @group users-api
     * Tests deleting a rank
     */
    public function testDeleteUser()
    {
        // Create a User
        $user = \Renegade\Models\Access\User\User::create(['name' => 'William Smith', 'email' => 'test1@test.com', 'password' => bcrypt('1234')]);
        $this
            ->json('DELETE','api/users/'.$user->id)
            ->assertResponseStatus(204);
    }

}
