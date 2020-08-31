<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table='role_has_permissions';
    public $fillable=['permission_id','role_id'];
}
