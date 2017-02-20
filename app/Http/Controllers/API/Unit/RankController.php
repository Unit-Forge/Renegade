<?php

namespace Renegade\Http\Controllers\API\Unit;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Models\Unit\Rank;
use Renegade\Repositories\API\Unit\RankRepository;

/**
 * Class RankController
 * @package Renegade\Http\Controllers\API\Unit
 */
class RankController extends Controller
{
    /**
     * @var $ranks
     */
    protected $ranks;

    public function __construct(RankRepository $rank)
    {
        $this->ranks = $rank;

    }

    public function index()
    {
        return $this->ranks->getAllRanks();

    }
}
