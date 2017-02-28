<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApplicationsAPITest extends TestCase
{
    /**
     * @group users-application-api
     * Tests getting an application for exisiting user
     */
    public function testGetApplication()
    {
        // Create a App
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $app = collect(['firstName' => 'Guillermo', 'lastName' => 'Rodriguez']);
        $application = $user->application()->create(['application' => $app->toJson(), 'status' => 1]);

        $this
            ->json('GET','api/users/'.$user->id.'/application')
            ->assertResponseStatus(200)
            ->seeJson([
                'status' => "1",
            ]);
    }

    /**
     * @group users-application-api
     * Tests creating a application - no authentication
     */
    public function testCreatingApplication()
    {
        // Create a Application
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $app = collect(['firstName' => 'Guillermo', 'lastName' => 'Rodriguez']);

        $this
            ->json('POST','api/users/'.$user->id.'/application',['application' => $app->toJson(), 'status' => 1])
            ->assertResponseStatus(201)
            ->seeJson([
                'status' => 1,
            ]);
    }


    /**
     * @group users-application-api
     * Tests updating a application
     */
    public function testUpdateApplication()
    {
        // Create a App
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $app = collect(['firstName' => 'Guillermo', 'lastName' => 'Rodriguez']);
        $application = $user->application()->create(['application' => $app->toJson(), 'status' => 1]);

        $this
            ->json('PUT','api/users/'.$user->id.'/application',['status' => 0])
            ->assertResponseStatus(200)
            ->seeJson([
                'status' => "0",
            ]);
    }

    /**
     * @group users-application-api
     * Tests deleting an application
     */
    public function testDeleteApplication()
    {
        // Create a App
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $app = collect(['firstName' => 'Guillermo', 'lastName' => 'Rodriguez']);
        $application = $user->application()->create(['application' => $app->toJson(), 'status' => 1]);

        $this
            ->json('DELETE','api/users/'.$user->id.'/application')
            ->assertResponseStatus(204);
    }


}
