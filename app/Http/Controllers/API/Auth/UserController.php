<?php

namespace Renegade\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Auth\CreateUserRequest;
use Renegade\Http\Requests\API\Auth\UpdateUserRequest;
use Renegade\Http\Requests\API\Unit\CreateRankRequest;
use Renegade\Http\Requests\API\Unit\DeleteRankRequest;
use Renegade\Http\Requests\API\Unit\UpdateRankRequest;
use Renegade\Models\Access\User\User;
use Renegade\Repositories\API\Auth\UserRepository;

class UserController extends Controller
{
    /**
     * @var $users
     */
    protected $users;

    /**
     * UserController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->users = $user;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->users->getAllUsers();
    }


    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateUserRequest $request)
    {
        return $this->users->create($request->all());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->users->show($id);
    }

    /**
     * @param $id
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, UpdateUserRequest $request)
    {
        $rank = User::findOrFail($id);
        return $this->users->update($rank,$request->all());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, DeleteRankRequest $request)
    {
        $rank = User::findOrFail($id);
        return $this->users->delete($rank);
    }
}
