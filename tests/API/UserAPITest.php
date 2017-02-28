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
    public function testGetRanks()
    {
        $user1 = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'john@test.com', 'password' => bcrypt('1234')]);
        $user2 = \Renegade\Models\Access\User\User::create(['name' => 'Bill Smith', 'email' => 'bill@test.com', 'password' => bcrypt('1234')]);

        $this
            ->json('GET','api/users')
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Bill Smith',
            ]);
    }

    /**
     * @group users-api
     * Tests getting a user
     */
    public function testGetUser()
    {
        $user1 = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'john@test.com', 'password' => bcrypt('1234')]);

        $this
            ->json('GET','api/users/'.$user1->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'John Doe',
            ]);
    }

    /**
     * @group users-api
     * Tests creating a rank - no authentication
     */
    public function testCreatingUser()
    {

        $this
            ->json('POST','api/users',['name' => 'John Doe', 'email' => 'john@test.com', 'password' => bcrypt('1234')])
            ->assertResponseStatus(201)
            ->seeJson([
                'name' => 'John Doe',
            ]);
    }


    /**
     * @group users-api
     * Tests updating a user
     */
    public function testUpdateRank()
    {
        // Create a User
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'john@test.com', 'password' => bcrypt('1234')]);


        $this
            ->json('PUT','api/users/'.$user->id,['email' => 'jane@smith.com'])
            ->assertResponseStatus(200)
            ->seeJson([
                'email' => 'jane@smith.com',
            ]);
    }

    /**
     * @group users-api
     * Tests deleting a user
     */
    public function testDeleteUser()
    {
        // Create a Rank
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'john@test.com', 'password' => bcrypt('1234')]);

        $this
            ->json('DELETE','api/users/'.$user->id)
            ->assertResponseStatus(204);
    }


}
