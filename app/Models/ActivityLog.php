<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';
    protected $fillable = ['user_id',  'name', 'budget_code_id', 'allocation_id', 'description', 'system', 'division'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level01()
    {
        return $this->hasMany(Level01::class, 'activity_log_id');
    }

    public function level02()
    {
        return $this->hasMany(Level02::class, 'activity_log_id');
    }

    public function level03()
    {
        return $this->hasMany(Level03::class, 'activity_log_id');
    }

    public function monthlyData()
    {
        return $this->hasMany(MonthlyData::class);
    }
}
