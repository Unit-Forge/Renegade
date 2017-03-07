<?php

namespace Renegade\Http\Controllers\Backend\Site;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\Backend\Site\Page\ManagePageRequest;
use Renegade\Repositories\API\Site\PageRepository;
use Yajra\Datatables\Facades\Datatables;

class PageTableController extends Controller
{
    /**
     * @var $page
     */
    protected $page;

    /**
     * PageController constructor.
     * @param PageRepository $page
     */
    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    /**
     * @param ManagePageRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePageRequest $request)
    {
        return Datatables::of($this->page->getForDataTable($request->get('status'), $request->get('trashed')))
            ->addColumn('actions', function ($page) {
                return $page->action_buttons;
            })
            ->withTrashed()
            ->make(true);
    }



}
