<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected  $table = 'role_permissions';

    protected $fillable = [
        'role_id',
        'permission_id',
    ];

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function permission(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }
}
