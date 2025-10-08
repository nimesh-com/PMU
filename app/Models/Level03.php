<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level03 extends Model
{
    protected $table = 'level03s';
    protected $fillable = ['name', 'description','activity_log_id'];

    public function activity_log()
    {
        return $this->belongsTo(ActivityLog::class);
    }
}
