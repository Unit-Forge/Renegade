<?php

namespace Renegade\Http\Controllers\Frontend\User;

use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\Frontend\User\UpdateProfileRequest;
use Renegade\Repositories\Frontend\Access\User\UserRepository;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
        $this->user->updateProfile(access()->id(), $request->all());

        if($request->hasFile('avatar'))
        {
            \Auth::User()->clearMediaCollection('profile');
            \Auth::User()->addMedia($request->file('avatar'))->toCollection('profile');
        }

        return redirect()->route('frontend.user.account')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }
}
