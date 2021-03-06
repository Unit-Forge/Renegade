<?php

namespace Renegade\Models\Access\Role;

use Illuminate\Database\Eloquent\Model;
use Renegade\Models\Access\Role\Traits\RoleAccess;
use Renegade\Models\Access\Role\Traits\Scope\RoleScope;
use Renegade\Models\Access\Role\Traits\Attribute\RoleAttribute;
use Renegade\Models\Access\Role\Traits\Relationship\RoleRelationship;

/**
 * Class Role.
 */
class Role extends Model
{
    use RoleScope,
        RoleAccess,
        RoleAttribute,
        RoleRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'all', 'sort'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.roles_table');
    }
}
