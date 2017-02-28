<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamspeakAPITest extends TestCase
{
    /**
     * @group users-teamspeak-api
     * Gets collection of all Teamspeak uuids
     */
    public function testGetAllUsersTeamspeak()
    {
        // Create a App
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $teamspeak = $user->teamspeak()->create(['uuid' => 'hello', 'description' => 'Computer']);
        $teamspeak2 = $user->teamspeak()->create(['uuid' => 'world', 'description' => 'Laptop']);

        $this
            ->json('GET','api/users/'.$user->id.'/teamspeak')
            ->assertResponseStatus(200)
            ->seeJson([
                'uuid' => 'world',
            ]);
    }

    /**
     * @group users-teamspeak-api
     * Gets a single teamspeak
     */
    public function testGetTeamspeak()
    {
        // Show Teamspeak
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $teamspeak = $user->teamspeak()->create(['uuid' => 'hello', 'description' => 'Computer']);

        $this
            ->json('GET','api/users/'.$user->id.'/teamspeak/'.$teamspeak->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'uuid' => 'hello',
            ]);
    }

    /**
     * @group users-teamspeak-api
     * Tests creating a teamspeak - no authentication
     */
    public function testCreatingTeamspeak()
    {
        // Create a User
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);

        $this
            ->json('POST','api/users/'.$user->id.'/teamspeak',['uuid' => 'helloworld', 'description' => 'Computer'])
            ->assertResponseStatus(201)
            ->seeJson([
                'description' => 'Computer',
            ]);
    }


    /**
     * @group users-teamspeak-api
     * Tests updating a teamspeak model
     */
    public function testUpdateTeamspeak()
    {
        // Create User and Teamspeak Model
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $teamspeak = $user->teamspeak()->create(['uuid' => 'hello', 'description' => 'Computer']);

        $this
            ->json('PUT','api/users/'.$user->id.'/teamspeak/'.$teamspeak->id,['uuid' => 'world'])
            ->assertResponseStatus(200)
            ->seeJson([
                'uuid' => 'world',
            ]);
    }

    /**
     * @group users-teamspeak-api
     * Tests deleting an teamspeak model
     */
    public function testDeleteTeamspeak()
    {
        // Create User and Teamspeak Model
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $teamspeak = $user->teamspeak()->create(['uuid' => 'hello', 'description' => 'Computer']);

        $this
            ->json('DELETE','api/users/'.$user->id.'/teamspeak/'.$teamspeak->id)
            ->assertResponseStatus(204);
    }


}
