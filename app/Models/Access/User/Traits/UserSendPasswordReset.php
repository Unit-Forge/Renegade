<?php

namespace Renegade\Models\Access\User\Traits;

use Renegade\Notifications\Frontend\Auth\UserNeedsPasswordReset;

/**
 * Class UserSendPasswordReset.
 */
trait UserSendPasswordReset
{
    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserNeedsPasswordReset($token));
    }
}
