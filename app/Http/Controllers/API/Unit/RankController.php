<?php

namespace Renegade\Http\Controllers\API\Unit;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Unit\Rank\CreateRankRequest;
use Renegade\Http\Requests\API\Unit\Rank\DeleteRankRequest;
use Renegade\Http\Requests\API\Unit\Rank\UpdateRankRequest;
use Renegade\Models\Unit\Rank;
use Renegade\Repositories\API\Unit\RankRepository;

/**
 * Class RankController
 * @package Renegade\Http\Controllers\API\Unit
 */
class RankController extends Controller
{
    /**
     * @var $rank
     */
    protected $rank;

    /**
     * ApplicationController constructor.
     * @param RankRepository $rank
     */
    public function __construct(RankRepository $rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->rank->getAllRanks();
    }

    /**
     * @param CreateRankRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateRankRequest $request)
    {
        return $this->rank->create($request->all());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $rank = Rank::findOrFail($id);
        return $this->rank->show($rank);
    }

    /**
     * @param UpdateRankRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRankRequest $request, $id)
    {
        $rank = Rank::findOrFail($id);
        return $this->rank->update($rank, $request->all());
    }

    /**
     * @param DeleteRankRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteRankRequest $request, $id)
    {
        $rank = Rank::findOrFail($id);
        return $this->rank->delete($rank, $request->all());
    }
}
