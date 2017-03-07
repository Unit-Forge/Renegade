<?php

namespace Renegade\Http\Controllers\Frontend;

use Renegade\Http\Controllers\Controller;
use Renegade\Models\Site\Menu;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
