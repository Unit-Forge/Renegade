<?php

namespace Renegade\Events\Backend\Access\User;

use Renegade\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserDeactivated.
 */
class UserDeactivated extends Event
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
