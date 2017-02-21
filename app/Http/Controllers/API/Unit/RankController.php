<?php

namespace Renegade\Http\Controllers\API\Unit;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Unit\CreateRankRequest;
use Renegade\Http\Requests\API\Unit\UpdateRankRequest;
use Renegade\Http\Requests\Frontend\User\UpdateProfileRequest;
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

    /**
     * RankController constructor.
     * @param RankRepository $rank
     */
    public function __construct(RankRepository $rank)
    {
        $this->ranks = $rank;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->ranks->getAllRanks();
    }


    /**
     * @param CreateRankRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateRankRequest $request)
    {
        return $this->ranks->create($request->all());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->ranks->show($id);
    }

    public function update($id, UpdateRankRequest $request)
    {
        $rank = Rank::findOrFail($id);
        return $this->ranks->update($rank,$request->all());
    }


}
