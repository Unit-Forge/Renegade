<?php

namespace Renegade\Repositories\Backend\Access\Permission;

use Renegade\Repositories\Repository;
use Renegade\Models\Access\Permission\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Permission::class;
}
