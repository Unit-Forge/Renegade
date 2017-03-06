<?php

namespace Renegade\Http\Controllers\API\Site;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Site\Page\CreatePageRequest;
use Renegade\Http\Requests\API\Site\Page\DeletePageRequest;
use Renegade\Http\Requests\API\Site\Page\UpdatePageRequest;
use Renegade\Models\Site\Page;
use Renegade\Repositories\API\Site\PageRepository;

class PageController extends Controller
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->page->getAllPages();
    }

    /**
     * @param CreatePageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreatePageRequest $request)
    {
        return $this->page->create($request->all());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return $this->page->show($page);
    }

    /**
     * @param UpdatePageRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $page = Page::findOrFail($id);
        return $this->page->update($page, $request->all());
    }

    /**
     * @param DeletePageRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeletePageRequest $request, $id)
    {
        $page = Page::findOrFail($id);
        return $this->page->delete($page, $request->all());
    }
}
