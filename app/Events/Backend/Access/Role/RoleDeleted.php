<?php

namespace Renegade\Events\Backend\Access\Role;

use Renegade\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleDeleted.
 */
class RoleDeleted extends Event
{
    use SerializesModels;

    /**
     * @var
     */
    public $role;

    /**
     * @param $role
     */
    public function __construct($role)
    {
        $this->role = $role;
    }
}
