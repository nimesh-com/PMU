<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level02 extends Model
{
    protected $table = 'level02s';
    protected $fillable = ['name', 'description','activity_log_id'];

    public function activityLog()
    {
        return $this->belongsTo(ActivityLog::class);
    }
}
