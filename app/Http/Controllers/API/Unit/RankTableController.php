<?php

namespace Renegade\Http\Controllers\API\Unit;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Renegade\Http\Controllers\Controller;
use Renegade\Models\Unit\Rank;
use Renegade\Repositories\API\Unit\RankRepository;

class RankTableController extends Controller
{
    /**
     * @var RankRepository
     */
    protected $ranks;

    /**
     * @param RankRepository $ranks
     */
    public function __construct(RankRepository $ranks)
    {
        $this->ranks = $ranks;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->ranks->getForDataTable())
            ->withTrashed()
            ->make(true);
    }
}
