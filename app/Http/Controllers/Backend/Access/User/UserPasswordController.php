<?php

namespace Renegade\Http\Controllers\Backend\Access\User;

use Renegade\Models\Access\User\User;
use Renegade\Http\Controllers\Controller;
use Renegade\Repositories\Backend\Access\User\UserRepository;
use Renegade\Http\Requests\Backend\Access\User\ManageUserRequest;
use Renegade\Http\Requests\Backend\Access\User\UpdateUserPasswordRequest;

/**
 * Class UserPasswordController.
 */
class UserPasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function edit(User $user, ManageUserRequest $request)
    {
        return view('backend.access.change-password')
            ->withUser($user);
    }

    /**
     * @param User                      $user
     * @param UpdateUserPasswordRequest $request
     *
     * @return mixed
     */
    public function update(User $user, UpdateUserPasswordRequest $request)
    {
        $this->users->updatePassword($user, $request->all());

        return redirect()->route('admin.access.user.index')->withFlashSuccess(trans('alerts.backend.users.updated_password'));
    }
}
