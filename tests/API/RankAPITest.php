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
}
