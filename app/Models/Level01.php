<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level01 extends Model
{
    protected $table = 'level01s';
    protected $fillable = ['name', 'description','activity_log_id'];

    public function activityLog()
    {
        return $this->belongsTo(ActivityLog::class);
    }
}
