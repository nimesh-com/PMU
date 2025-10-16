<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyData extends Model
{
    protected $table = 'monthly_data';

    protected $fillable = [
        'activity_log_id',
        'year',
        'month',
        'financial',
        'physical',
    ];

    public function activityLogs()
    {
        return $this->belongsTo(ActivityLog::class, 'activity_log_id');
    }

}
