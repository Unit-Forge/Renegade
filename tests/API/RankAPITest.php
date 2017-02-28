<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RankAPITest extends TestCase
{
    /**
     * @group users-ranks-api
     * Tests getting all ranks
     */
    public function testGetRanks()
    {
        $rank1 = \Renegade\Models\Unit\Rank::create(['name' => 'Private']);
        $rank2 = \Renegade\Models\Unit\Rank::create(['name' => 'Private First Class']);

        $this
            ->json('GET','api/unit/ranks')
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Private First Class',
            ]);
    }

    /**
     * @group users-ranks-api
     * Tests getting all ranks
     */
    public function testGetRank()
    {
        $rank = \Renegade\Models\Unit\Rank::create(['name' => 'Private']);

        $this
            ->json('GET','api/unit/ranks/'.$rank->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Private',
            ]);
    }

    /**
     * @group users-ranks-api
     * Tests creating a rank - no authentication
     */
    public function testCreatingRank()
    {

        $this
            ->json('POST','api/unit/ranks',['name' => 'Captain'])
            ->assertResponseStatus(201)
            ->seeJson([
                'name' => 'Captain',
            ]);
    }


    /**
     * @group users-ranks-api
     * Tests updating a rank
     */
    public function testUpdateRank()
    {
        // Create a Rank
        $rank = \Renegade\Models\Unit\Rank::create(['name' => 'Private']);

        $this
            ->json('PUT','api/unit/ranks/'.$rank->id,['name' => 'Captain'])
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Captain',
            ]);
    }

    /**
     * @group users-ranks-api
     * Tests deleting a rank
     */
    public function testDeleteRank()
    {
        // Create a Rank
        $rank = \Renegade\Models\Unit\Rank::create(['name' => 'Private']);

        $this
            ->json('DELETE','api/unit/ranks/'.$rank->id)
            ->assertResponseStatus(204);
    }


}
