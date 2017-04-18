<?php

namespace Renegade\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Models\Access\User\User;

class AutocompleteController extends Controller
{
    public function getUsers(Request $request)
    {
        $users = User::where('name', 'LIKE', '%'.$request->q.'%')->get();
        $results = collect();
        foreach ($users as $user)
        {
            $rt = [
                'id' => $user->id,
                'text' => $user->name
            ];
            $results->push($rt);
        }
        return \Response::json(['results' => $results]);
    }
}
