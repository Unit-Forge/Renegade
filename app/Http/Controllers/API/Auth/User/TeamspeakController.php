<?php

namespace Renegade\Http\Controllers\API\Auth\User;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Auth\User\Teamspeak\CreateTeamspeakRequest;
use Renegade\Http\Requests\API\Auth\User\Teamspeak\DeleteTeamspeakRequest;
use Renegade\Http\Requests\API\Auth\User\Teamspeak\UpdateTeamspeakRequest;
use Renegade\Models\Access\User\Teamspeak;
use Renegade\Models\Access\User\User;
use Renegade\Repositories\API\Auth\User\TeamspeakRepository;

/**
 * Class TeamspeakController
 * @package Renegade\Http\Controllers\API\Auth\User
 */
class TeamspeakController extends Controller
{
    /**
     * @var $teamspeak
     */
    protected $teamspeak;

    /**
     * TeamspeakController constructor.
     * @param TeamspeakRepository $teamspeak
     */
    public function __construct(TeamspeakRepository $teamspeak)
    {
        $this->teamspeak = $teamspeak;
    }

    /**
     * @param $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($user)
    {
        $user = User::findOrFail($user);
        return $this->teamspeak->getAllTeamspeaks($user);
    }

    /**
     * @param $user
     * @param $teamspeak
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($user, $teamspeak)
    {
        $teamspeak = Teamspeak::findOrFail($teamspeak);
        return $this->teamspeak->show($teamspeak);
    }

    /**
     * @param $user
     * @param CreateTeamspeakRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($user, CreateTeamspeakRequest $request)
    {
        $user = User::findOrFail($user);
        return $this->teamspeak->create($user,$request->all());
    }

    /**
     * @param $user
     * @param $teamspeak
     * @param UpdateTeamspeakRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($user, $teamspeak, UpdateTeamspeakRequest $request)
    {
        $user = User::findOrFail($user);
        $teamspeak = Teamspeak::findOrFail($teamspeak);
        return $this->teamspeak->update($teamspeak, $request->all());
    }

    /**
     * @param $user
     * @param $teamspeak
     * @param DeleteTeamspeakRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($user, $teamspeak, DeleteTeamspeakRequest $request)
    {
        $user = User::findOrFail($user);
        $teamspeak = Teamspeak::findOrFail($teamspeak);
        return $this->teamspeak->delete($teamspeak);
    }
}
