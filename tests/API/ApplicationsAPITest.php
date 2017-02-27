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
        // Create a Rank
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
     * Tests creating a rank - no authentication
     */
    public function testCreatingApplication()
    {
        // Create a Rank
        $user = \Renegade\Models\Access\User\User::create(['name' => 'John Doe', 'email' => 'test@test.com', 'password' => bcrypt('1234')]);
        $app = collect(['firstName' => 'Guillermo', 'lastName' => 'Rodriguez']);

        $this
            ->json('POST','api/users/'.$user->id.'/application',['application' => $app->toJson(), 'status' => 1])
            ->assertResponseStatus(201)
            ->seeJson([
                'status' => 1,
            ]);
    }


}
