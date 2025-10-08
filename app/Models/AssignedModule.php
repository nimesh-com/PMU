<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedModule extends Model
{
    protected $table = 'assigned_modules';

    protected $fillable = ['role_id', 'module_id'];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

}
