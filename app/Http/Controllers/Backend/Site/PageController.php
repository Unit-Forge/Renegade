<?php

namespace Renegade\Http\Controllers\Backend\Site;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\Backend\Site\Page\ManagePageRequest;

class PageController extends Controller
{
    public function index(ManagePageRequest $request)
    {
        return view('backend.site.pages.index');
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function edit()
    {

    }
}
