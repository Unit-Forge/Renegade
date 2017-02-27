<?php

namespace Renegade\Http\Controllers\API\Auth\User;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Auth\User\Application\CreateApplicationRequest;
use Renegade\Http\Requests\API\Auth\User\Application\DeleteApplicationRequest;
use Renegade\Http\Requests\API\Auth\User\Application\UpdateApplicationRequest;
use Renegade\Models\Access\User\Application;
use Renegade\Models\Access\User\User;
use Renegade\Repositories\API\Auth\User\ApplicationRepository;

/**
 * Class ApplicationController
 * @package Renegade\Http\Controllers\API\Auth\User
 */
class ApplicationController extends Controller
{
    /**
     * @var $application
     */
    protected $application;

    /**
     * UserController constructor.
     * @param ApplicationRepository $application
     */
    public function __construct(ApplicationRepository $application)
    {
        $this->application = $application;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->application->show($user);
    }

    /**
     * @param CreateApplicationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($id,CreateApplicationRequest $request)
    {
        $user = User::findOrFail($id);
        return $this->application->create($user,$request->all());
    }

    /**
     * @param $id
     * @param UpdateApplicationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, UpdateApplicationRequest $request)
    {
        $user = User::findOrFail($id);
        return $this->application->update($user,$request->all());
    }

    /**
     * @param $id
     * @param DeleteApplicationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, DeleteApplicationRequest $request)
    {
        $user = User::findOrFail($id);
        return $this->application->delete($user,$request->all());
    }

}
