<?php

namespace Renegade\Events\Frontend\Auth;

use Renegade\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserConfirmed.
 */
class UserConfirmed extends Event
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}
