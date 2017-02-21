<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class RankAPITest.
 */
class RankAPITest extends TestCase
{
    /**
     * @group ranks-api
     * Tests getting all ranks
     */
    public function testGetAllRanks()
    {
        // Create a Rank
        $rank = \Renegade\Models\Unit\Rank::create(['name' => 'Private']);
        $rank = \Renegade\Models\Unit\Rank::create(['name' => 'Private First Class']);
        $this
            ->json('GET','api/unit/ranks')
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Private',
            ]);
    }

    /**
     * @group ranks-api
     * Tests creating a rank - no authentication
     */
    public function testCreatingRank()
    {
        $this
            ->json('POST','api/unit/ranks',['name'=>'Sergeant',])
            ->assertResponseStatus(201)
            ->seeJson([
                'name' => 'Sergeant',
            ]);
    }

    /**
     * @group ranks-api
     * Tests getting a rank
     */
    public function testGetOneRank()
    {
        // Create a Rank
        $rank = \Renegade\Models\Unit\Rank::create(['name' => 'Captain']);
        $this
            ->json('GET','api/unit/ranks/'.$rank->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Captain',
            ]);
    }

    /**
     * @group ranks-api
     * Tests updating a rank
     */
    public function testUpdateRank()
    {
        // Create a Rank
        $rank = \Renegade\Models\Unit\Rank::create(['name' => 'Captain']);
        $this
            ->json('PUT','api/unit/ranks/'.$rank->id,['name' => 'Colonel'])
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Colonel',
            ]);
    }

}
